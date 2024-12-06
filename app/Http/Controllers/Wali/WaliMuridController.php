<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Wali;
use App\Models\Daftarsiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class WaliMuridController extends Controller
{
    public function index()
    {
        $murids = Murid::all();
        dd($murids);
        return view('wali.pages.siswa.index', compact('murids'));
    }

    public function create()
    {
        $murids = Murid::all(); // Mengambil semua data dari tabel murids
        return view('wali.pages.siswa.create', compact('murids'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:murids',
            'nisn' => 'required|unique:murids',
            'name' => 'required',
            'email' => 'required|email|unique:murids',
            'password' => 'required|min:6',
            'gender' => 'required|in:L,P',
            'birth_place' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone_number' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required', 
            'parent_phone' => 'required',
            'parent_address' => 'required',
            'class' => 'required',
            'major' => 'required',
            'academic_year' => 'required|integer',
            'semester' => 'required|integer',
            'photo' => 'nullable|image|max:2048'
        ]);

        if($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/photos');
            $validated['photo'] = Storage::url($photoPath);
        }

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'student';

        Murid::create($validated);

        return redirect()->route('wali.siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function show(Murid $siswa)
    {
        return view('wali.siswa.show', ['siswa' => $siswa]);
    }

    public function edit($nis)
    {
        $murid = Murid::where('nis', $nis)->firstOrFail();
        return view('wali.pages.siswa.edit', compact('murid'));
    }

    public function update(Request $request, $nis)
    {
        $murid = Murid::where('nis', $nis)->firstOrFail();
        
        $validated = $request->validate([
            'nis' => 'required|unique:murids,nis,'.$murid->id,
            'nisn' => 'required|unique:murids,nisn,'.$murid->id,
            'name' => 'required',
            'email' => 'required|email|unique:murids,email,'.$murid->id,
            'gender' => 'required|in:L,P',
            'birth_place' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone_number' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'parent_phone' => 'required', 
            'parent_address' => 'required',
            'class' => 'required',
            'major' => 'required',
            'academic_year' => 'required|integer',
            'semester' => 'required|integer',
            'photo' => 'nullable|image|max:2048'
        ]);

        if($request->hasFile('photo')) {
            // Delete old photo
            if($murid->photo) {
                Storage::delete(str_replace('/images', 'public/images', $murid->photo));
            }
            
            $photoPath = $request->file('photo')->store('public/images');
            $validated['photo'] = Storage::url($photoPath);
        }

        if($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $murid->update($validated);

        return redirect()->route('wali.siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy(Murid $murid)
    {
        if($murid->photo) {
            Storage::delete(str_replace('/storage', 'public', $murid->photo));
        }
        
        $murid->delete();

        return redirect()->route('wali.siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
