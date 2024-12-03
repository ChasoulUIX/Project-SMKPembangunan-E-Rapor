<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::orderBy('created_at', 'desc')->get();
        return view('admin.pages.guru', compact('gurus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|unique:gurus',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:gurus',
            'password' => 'required|string|min:3',
            'gender' => 'required|in:L,P',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'role' => 'required|in:murid,guru,wali,admin'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $filename);
            $validated['photo'] = '/images/' . $filename;
        }

        $validated['password'] = Hash::make($validated['password']);

        DB::beginTransaction();
        try {
            // Create guru
            $guru = Guru::create($validated);

            // Create user
            User::create([
                'name' => $validated['name'],
                'nip' => $validated['nip'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => 'guru'
            ]);

            DB::commit();
            return redirect()->route('admin.pages.guru.index')->with('success', 'Data guru berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error creating guru: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $guru = Guru::with(['kelas'])->findOrFail($id);
        return response()->json($guru);
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $validated = $request->validate([
            'nip' => 'required|string|unique:gurus,nip,' . $id,
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:gurus,email,' . $id,
            'password' => 'nullable|string|min:3',
            'gender' => 'required|in:L,P',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'role' => 'required|in:murid,guru,wali,admin'
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($guru->photo && file_exists(public_path($guru->photo))) {
                unlink(public_path($guru->photo));
            }

            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $filename);
            $validated['photo'] = '/images/' . $filename;
        }

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        DB::beginTransaction();
        try {
            // Update guru
            $guru->update($validated);

            // Update corresponding user
            $user = User::where('nip', $guru->getOriginal('nip'))->first();
            if ($user) {
                $userData = [
                    'name' => $validated['name'],
                    'nip' => $validated['nip'],
                    'email' => $validated['email']
                ];
                
                if (isset($validated['password'])) {
                    $userData['password'] = $validated['password'];
                }
                
                $user->update($userData);
            }

            DB::commit();
            return redirect()->route('admin.pages.guru.index')->with('success', 'Data guru berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error updating guru: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        DB::beginTransaction();
        try {
            if ($guru->photo && file_exists(public_path($guru->photo))) {
                unlink(public_path($guru->photo));
            }

            // Delete corresponding user
            User::where('nip', $guru->nip)->delete();
            
            // Delete guru
            $guru->delete();

            DB::commit();
            return redirect()->route('admin.pages.guru.index')->with('success', 'Data guru berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error deleting guru: ' . $e->getMessage());
        }
    }
}
