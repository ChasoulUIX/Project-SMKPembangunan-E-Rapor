<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\User;
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
        return view('admin.pages.siswa', compact('murids'));
    }

    public function create()
    {
        return view('admin.pages.siswa');
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
            'role' => 'required|in:murid,guru,wali,admin'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $filename);
            $validated['photo'] = 'images/' . $filename;
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
                'nis' => $validated['nis'], // Store NIS in users table
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => 'murid'
            ]);

            DB::commit();
            return redirect()->route('admin.pages.siswa')->with('success', 'Murid created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error creating murid: ' . $e->getMessage());
        }
    }

    public function show(Murid $murid)
    {
        return view('admin.pages.siswa', compact('murid'));
    }

    public function edit(Murid $murid)
    {
        return view('admin.pages.siswa', compact('murid'));
    }

    public function update(Request $request, Murid $murid)
    {
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
            'role' => 'required|in:murid,guru,wali,admin',
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
            // Update murid
            $murid->update($validated);

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
            return redirect()->route('admin.pages.siswa')->with('success', 'Murid updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error updating murid: ' . $e->getMessage());
        }
    }

    public function destroy(Murid $murid)
    {
        DB::beginTransaction();
        try {
            if ($murid->photo) {
                $photoPath = public_path($murid->photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }
            
            // Delete corresponding user
            User::where('nis', $murid->nis)->delete();
            
            // Delete murid
            $murid->delete();

            DB::commit();
            return redirect()->route('admin.pages.siswa')->with('success', 'Murid deleted successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error deleting murid: ' . $e->getMessage());
        }
    }
}
