<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\User;
use App\Models\Kelas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MuridController extends Controller
{
    public function index()
    {
        $murids = Murid::all();
        $kelas = Kelas::all();
        return view('admin.pages.siswa', compact('murids', 'kelas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.pages.siswa', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|string|unique:murids',
            'nisn' => 'required|string|unique:murids',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:murids',
            'password' => 'required|string|min:3',
            'gender' => 'required|in:L,P',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'parent_phone' => 'required|string',
            'parent_address' => 'nullable|string',
            'class' => 'required|string',
            'major' => 'required|in:multimedia,akuntansi,perkantoran,pemasaran',
            'academic_year' => 'required|integer',
            'semester' => 'required|in:1,2',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'role' => 'required|in:murid'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $filename);
            $validated['photo'] = '/images/' . $filename;
        }

        $validated['password'] = Hash::make($validated['password']);
        $validated['created_at'] = Carbon::now();
        $validated['updated_at'] = Carbon::now();

        DB::beginTransaction();
        try {
            // Create murid
            $murid = Murid::create($validated);

            // Create user
            User::create([
                'name' => $validated['name'],
                'nis' => $validated['nis'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => 'murid'
            ]);

            // Update kelas daftar_siswa
            $kelas = Kelas::where('nama_kelas', $validated['class'])->first();
            if ($kelas) {
                $daftar_siswa = $kelas->daftar_siswa ?? [];
                $daftar_siswa[] = $validated['name'];
                $kelas->update(['daftar_siswa' => $daftar_siswa]);
            }

            DB::commit();
            return redirect()->route('admin.pages.siswa')->with('success', 'Siswa berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error menambahkan siswa: ' . $e->getMessage());
        }
    }

    public function show($nis)
    {
        $murid = Murid::where('nis', $nis)->firstOrFail();
        $kelas = Kelas::all();
        return view('admin.pages.siswa', compact('murid', 'kelas'));
    }

    public function edit($nis)
    {
        $murid = Murid::where('nis', $nis)->firstOrFail();
        $kelas = Kelas::all();
        return response()->json(['murid' => $murid, 'kelas' => $kelas]);
    }

    public function update(Request $request, $nis)
    {
        $murid = Murid::where('nis', $nis)->firstOrFail();
        $validated = $request->validate([
            'nis' => 'required|string|unique:murids,nis,' . $murid->id,
            'nisn' => 'required|string|unique:murids,nisn,' . $murid->id,
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:murids,email,' . $murid->id,
            'gender' => 'required|in:L,P',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'parent_phone' => 'required|string',
            'parent_address' => 'nullable|string',
            'class' => 'required|string',
            'major' => 'required|in:multimedia,akuntansi,perkantoran,pemasaran',
            'academic_year' => 'required|integer',
            'semester' => 'required|in:1,2',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'role' => 'required|in:murid',
            'password' => 'nullable|string|min:3'
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($murid->photo && file_exists(public_path($murid->photo))) {
                unlink(public_path($murid->photo));
            }

            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $filename);
            $validated['photo'] = '/images/' . $filename;
        }

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['updated_at'] = Carbon::now();

        DB::beginTransaction();
        try {
            // Remove from old class
            $oldKelas = Kelas::where('nama_kelas', $murid->class)->first();
            if ($oldKelas) {
                $daftar_siswa = $oldKelas->daftar_siswa ?? [];
                $daftar_siswa = array_filter($daftar_siswa, function($siswa) use ($murid) {
                    return $siswa !== $murid->name;
                });
                $oldKelas->update(['daftar_siswa' => array_values($daftar_siswa)]);
            }

            // Update murid
            $murid->update($validated);

            // Add to new class
            $newKelas = Kelas::where('nama_kelas', $validated['class'])->first();
            if ($newKelas) {
                $daftar_siswa = $newKelas->daftar_siswa ?? [];
                $daftar_siswa[] = $validated['name'];
                $newKelas->update(['daftar_siswa' => $daftar_siswa]);
            }

            // Update corresponding user
            $user = User::where('nis', $murid->getOriginal('nis'))->first();
            if ($user) {
                $userData = [
                    'name' => $validated['name'],
                    'nis' => $validated['nis'],
                    'email' => $validated['email']
                ];
                
                if (isset($validated['password'])) {
                    $userData['password'] = $validated['password'];
                }
                
                $user->update($userData);
            }

            DB::commit();
            return redirect()->route('admin.pages.siswa')->with('success', 'Data siswa berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error memperbarui data siswa: ' . $e->getMessage());
        }
    }

    public function destroy($nis)
    {
        DB::beginTransaction();
        try {
            $murid = Murid::where('nis', $nis)->firstOrFail();
            
            // Remove from class
            $kelas = Kelas::where('nama_kelas', $murid->class)->first();
            if ($kelas) {
                $daftar_siswa = $kelas->daftar_siswa ?? [];
                $daftar_siswa = array_filter($daftar_siswa, function($siswa) use ($murid) {
                    return $siswa !== $murid->name;
                });
                $kelas->update(['daftar_siswa' => array_values($daftar_siswa)]);
            }

            if ($murid->photo) {
                $photoPath = public_path($murid->photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }
            
            // Delete corresponding user
            User::where('nis', $nis)->delete();
            
            // Delete murid
            $murid->delete();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data siswa berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error menghapus data siswa: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getByNis($nis)
    {
        $murid = Murid::where('nis', $nis)->first();
        
        if (!$murid) {
            return response()->json([
                'success' => false,
                'message' => 'Data siswa tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $murid
        ]);
    }
}
