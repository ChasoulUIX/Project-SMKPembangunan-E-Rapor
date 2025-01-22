<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Daftarsiswa;
use App\Models\Murid;
use App\Models\Wali;
use App\Models\Kelas;
use Illuminate\Http\Request;

class DaftarSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $murids = Murid::all();
        $kelas = Kelas::all();
        $wali = Wali::all();
        
        if ($kelas->isEmpty()) {
            return back()->with('error', 'No classes found');
        }

        return view('wali.pages.siswa', compact('murids', 'kelas', 'wali'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $murids = Murid::all();
        $kelas = Kelas::all();
        $wali = Wali::all();
        return view('wali.pages.siswa', compact('murids', 'kelas', 'wali'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_kelas' => 'required|exists:walis,name',
            'jurusan' => 'required|string|max:255',
            'daftar_siswa' => 'required'
        ]);

        // Get wali data from walis table based on name
        $wali = Wali::where('name', $validated['wali_kelas'])->first();
        if (!$wali) {
            return back()->with('error', 'Wali kelas tidak ditemukan');
        }

        // Get kelas data based on nama_kelas
        $kelas = Kelas::where('nama_kelas', $validated['nama_kelas'])->first();
        if (!$kelas) {
            return back()->with('error', 'Kelas tidak ditemukan');
        }

        // Decode the JSON string from select input
        $siswaData = json_decode($request->daftar_siswa, true);
        
        if (!$siswaData) {
            return back()->with('error', 'Data siswa tidak valid');
        }

        // Check if record with same nama_kelas already exists
        $existingRecord = Daftarsiswa::where('nama_kelas', $validated['nama_kelas'])->first();

        if ($existingRecord) {
            // If exists, append new student to existing daftar_siswa array
            $currentDaftarSiswa = $existingRecord->daftar_siswa;
            if (!in_array($siswaData, $currentDaftarSiswa)) {
                $currentDaftarSiswa[] = $siswaData;
                $existingRecord->update([
                    'daftar_siswa' => $currentDaftarSiswa,
                    'id_kelas' => $kelas->id,
                    'nip' => $wali->nip
                ]);
            }
        } else {
            // If not exists, create new record
            $validated['daftar_siswa'] = [$siswaData];
            $validated['id_kelas'] = $kelas->id;
            $validated['nip'] = $wali->nip;
            Daftarsiswa::create($validated);
        }

        return redirect()->route('wali.siswa.index')
            ->with('success', 'Daftar siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Daftarsiswa $daftarSiswa)
    {
        $murids = Murid::all();
        $kelas = Kelas::all();
        return view('wali.pages.siswa', compact('murids', 'kelas', 'daftarSiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftarsiswa $daftarSiswa)
    {
        $murids = Murid::all();
        $kelas = Kelas::all();
        return view('wali.pages.siswa', compact('murids', 'kelas', 'daftarSiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daftarsiswa $daftarSiswa)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_kelas' => 'required|exists:walis,name',
            'jurusan' => 'required|string|max:255',
            'daftar_siswa' => 'required'
        ]);

        // Get wali data from walis table based on name
        $wali = Wali::where('name', $validated['wali_kelas'])->first();
        if (!$wali) {
            return back()->with('error', 'Wali kelas tidak ditemukan');
        }

        // Get kelas data based on nama_kelas
        $kelas = Kelas::where('nama_kelas', $validated['nama_kelas'])->first();
        if (!$kelas) {
            return back()->with('error', 'Kelas tidak ditemukan');
        }

        // Decode the JSON string from select input
        $siswaData = json_decode($request->daftar_siswa, true);
        
        if (!$siswaData) {
            return back()->with('error', 'Data siswa tidak valid');
        }

        $validated['daftar_siswa'] = [$siswaData];
        $validated['id_kelas'] = $kelas->id;
        $validated['nip'] = $wali->nip;

        $daftarSiswa->update($validated);

        return redirect()->route('wali.siswa.index')
            ->with('success', 'Daftar siswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftarsiswa $daftarSiswa)
    {
        $daftarSiswa->delete();

        return redirect()->route('wali.siswa.index')
            ->with('success', 'Daftar siswa berhasil dihapus');
    }
}
