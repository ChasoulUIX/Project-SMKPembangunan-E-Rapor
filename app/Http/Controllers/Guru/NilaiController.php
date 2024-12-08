<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Nilaisiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilaisiswa::where('nama_guru', Auth::user()->name)->get();
        return view('guru.pages.nilai', compact('nilai'));
    }

    public function create()
    {
        return view('guru.pages.nilai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|integer',
            'nama_kelas' => 'required|string',
            'nis' => 'required|integer',
            'nama_siswa' => 'required|string',
            'nama_mapel' => 'required|string',
            'nama_wali' => 'required|string',
            'materi_1' => 'nullable|integer|min:0|max:100',
            'materi_2' => 'nullable|integer|min:0|max:100',
            'materi_3' => 'nullable|integer|min:0|max:100',
            'materi_4' => 'nullable|integer|min:0|max:100',
            'materi_5' => 'nullable|integer|min:0|max:100',
            'uts' => 'nullable|integer|min:0|max:100',
            'uas' => 'nullable|integer|min:0|max:100',
            'kehadiran' => 'nullable|integer|min:0|max:100',
            'sikap' => 'nullable|integer|min:0|max:100'
        ]);

        // Calculate na_materi (average of materi_1 to materi_5)
        $materi_values = [
            $request->materi_1 ?? 0,
            $request->materi_2 ?? 0,
            $request->materi_3 ?? 0,
            $request->materi_4 ?? 0,
            $request->materi_5 ?? 0
        ];
        $na_materi = array_sum($materi_values) / 5;

        // Calculate nilai_rapor
        $nilai_rapor = ($na_materi * 0.4) + 
                      (($request->uts ?? 0) * 0.2) + 
                      (($request->uas ?? 0) * 0.2) + 
                      (($request->kehadiran ?? 0) * 0.1) + 
                      (($request->sikap ?? 0) * 0.1);

        Nilaisiswa::create([
            'id_kelas' => $request->id_kelas,
            'nama_kelas' => $request->nama_kelas,
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'nama_guru' => Auth::user()->name,
            'nama_mapel' => $request->nama_mapel,
            'nama_wali' => $request->nama_wali,
            'nama_materi_1' => $request->nama_materi_1 ?? 0,
            'nama_materi_2' => $request->nama_materi_2 ?? 0,
            'nama_materi_3' => $request->nama_materi_3 ?? 0,
            'nama_materi_4' => $request->nama_materi_4 ?? 0,
            'nama_materi_5' => $request->nama_materi_5 ?? 0,
            'materi_1' => $request->materi_1 ?? 0,
            'materi_2' => $request->materi_2 ?? 0,
            'materi_3' => $request->materi_3 ?? 0,
            'materi_4' => $request->materi_4 ?? 0,
            'materi_5' => $request->materi_5 ?? 0,
            'na_materi' => $na_materi,
            'uts' => $request->uts ?? 0,
            'uas' => $request->uas ?? 0,
            'kehadiran' => $request->kehadiran ?? 0,
            'sikap' => $request->sikap ?? 0,
            'nilai_rapor' => $nilai_rapor
        ]);

        return redirect()->route('guru.nilai.index')->with('success', 'Nilai berhasil ditambahkan');
    }

    public function show($id)
    {
        $nilai = Nilaisiswa::findOrFail($id);
        return view('guru.pages.nilai.show', compact('nilai'));
    }

    public function edit($id)
    {
        $nilai = Nilaisiswa::findOrFail($id);
        return response()->json($nilai);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_materi_1' => 'nullable|string',
            'nama_materi_2' => 'nullable|string',
            'nama_materi_3' => 'nullable|string',
            'nama_materi_4' => 'nullable|string',
            'nama_materi_5' => 'nullable|string',
            'materi_1' => 'nullable|integer|min:0|max:100',
            'materi_2' => 'nullable|integer|min:0|max:100',
            'materi_3' => 'nullable|integer|min:0|max:100',
            'materi_4' => 'nullable|integer|min:0|max:100',
            'materi_5' => 'nullable|integer|min:0|max:100',
            'uts' => 'nullable|integer|min:0|max:100',
            'uas' => 'nullable|integer|min:0|max:100',
            'kehadiran' => 'nullable|integer|min:0|max:100',
            'sikap' => 'nullable|integer|min:0|max:100'
        ]);

        // Calculate na_materi (average of materi_1 to materi_5)
        $materi_values = [
            $request->materi_1 ?? 0,
            $request->materi_2 ?? 0,
            $request->materi_3 ?? 0,
            $request->materi_4 ?? 0,
            $request->materi_5 ?? 0
        ];
        $na_materi = array_sum($materi_values) / 5;

        // Calculate nilai_rapor
        $nilai_rapor = ($na_materi * 0.4) + 
                      (($request->uts ?? 0) * 0.2) + 
                      (($request->uas ?? 0) * 0.2) + 
                      (($request->kehadiran ?? 0) * 0.1) + 
                      (($request->sikap ?? 0) * 0.1);

        $nilai = Nilaisiswa::findOrFail($id);
        $nilai->update([
            'nama_materi_1' => $request->nama_materi_1 ?? 0,
            'nama_materi_2' => $request->nama_materi_2 ?? 0,
            'nama_materi_3' => $request->nama_materi_3 ?? 0,
            'nama_materi_4' => $request->nama_materi_4 ?? 0,
            'nama_materi_5' => $request->nama_materi_5 ?? 0,
            'materi_1' => $request->materi_1 ?? 0,
            'materi_2' => $request->materi_2 ?? 0,
            'materi_3' => $request->materi_3 ?? 0,
            'materi_4' => $request->materi_4 ?? 0,
            'materi_5' => $request->materi_5 ?? 0,
            'na_materi' => $na_materi,
            'uts' => $request->uts ?? 0,
            'uas' => $request->uas ?? 0,
            'kehadiran' => $request->kehadiran ?? 0,
            'sikap' => $request->sikap ?? 0,
            'nilai_rapor' => $nilai_rapor
        ]);

        return redirect()->route('guru.nilai.index')->with('success', 'Nilai berhasil diperbarui');
    }

    public function destroy($id)
    {
        $nilai = Nilaisiswa::findOrFail($id);
        $nilai->delete();

        return redirect()->route('guru.nilai.index')->with('success', 'Nilai berhasil dihapus');
    }

    public function detailkelas($id_kelas)
    {
        $nilai = Nilaisiswa::where('id_kelas', $id_kelas)
            ->where('nama_guru', Auth::user()->name)
            ->get();
        
        return view('guru.pages.detailkelas', compact('nilai'));
    }
}
