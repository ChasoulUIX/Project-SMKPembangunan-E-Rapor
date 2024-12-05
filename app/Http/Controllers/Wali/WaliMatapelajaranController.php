<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Daftarmatapelajaran;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliMatapelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get mata pelajaran for current wali kelas only
        $matapelajarans = Daftarmatapelajaran::where('nama_wali', Auth::user()->name)->get();
        return view('wali.pages.matapelajaran', compact('matapelajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get kelas where current user is wali kelas
        $kelas = Kelas::where('wali_kelas', Auth::user()->name)->get();
        return view('wali.pages.matapelajaran.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'nama_kelas' => 'required|string|max:255',
            'nama_wali' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255', 
            'nama_guru' => 'required|string|max:255',
            'nama_mapel' => 'required|string|max:255',
            'daftar_siswa' => 'required|array'
        ]);

        // Set nama_wali to current authenticated user's name
        $validated['nama_wali'] = Auth::user()->name;

        // Get kelas details
        $kelas = Kelas::find($request->id_kelas);
        $validated['nama_kelas'] = $kelas->nama_kelas;
        $validated['jurusan'] = $kelas->jurusan;

        Daftarmatapelajaran::create($validated);

        return redirect()->route('wali.matapelajaran.index')
            ->with('success', 'Mata pelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Daftarmatapelajaran $matapelajaran)
    {
        // Check if matapelajaran belongs to current wali
        if($matapelajaran->nama_wali !== Auth::user()->name) {
            abort(403);
        }
        return view('wali.pages.matapelajaran.show', compact('matapelajaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftarmatapelajaran $matapelajaran)
    {
        // Check if matapelajaran belongs to current wali
        if($matapelajaran->nama_wali !== Auth::user()->name) {
            abort(403);
        }
        $kelas = Kelas::where('wali_kelas', Auth::user()->name)->get();
        return view('wali.pages.matapelajaran.edit', compact('matapelajaran', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daftarmatapelajaran $matapelajaran)
    {
        // Check if matapelajaran belongs to current wali
        if($matapelajaran->nama_wali !== Auth::user()->name) {
            abort(403);
        }

        $validated = $request->validate([
            'id_kelas' => 'required|exists:kelas,id',
            'nama_kelas' => 'required|string|max:255',
            'nama_wali' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'nama_guru' => 'required|string|max:255',
            'nama_mapel' => 'required|string|max:255',
            'daftar_siswa' => 'required|array'
        ]);

        // Get kelas details
        $kelas = Kelas::find($request->id_kelas);
        $validated['nama_kelas'] = $kelas->nama_kelas;
        $validated['jurusan'] = $kelas->jurusan;
        $validated['nama_wali'] = Auth::user()->name;

        $matapelajaran->update($validated);

        return redirect()->route('wali.matapelajaran.index')
            ->with('success', 'Mata pelajaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftarmatapelajaran $matapelajaran)
    {
        // Check if matapelajaran belongs to current wali
        if($matapelajaran->nama_wali !== Auth::user()->name) {
            abort(403);
        }
        
        $matapelajaran->delete();

        return redirect()->route('wali.matapelajaran.index')
            ->with('success', 'Mata pelajaran berhasil dihapus');
    }
}
