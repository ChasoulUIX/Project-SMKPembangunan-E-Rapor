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
            'nis' => 'required|integer',
            'nama_siswa' => 'required|string',
            'nama_mapel' => 'required|string',
            'nama_wali' => 'required|string',
            'uts' => 'required|integer|min:0|max:100',
            'uas' => 'required|integer|min:0|max:100'
        ]);

        Nilaisiswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'nama_guru' => Auth::user()->name,
            'nama_mapel' => $request->nama_mapel,
            'nama_wali' => $request->nama_wali,
            'uts' => $request->uts,
            'uas' => $request->uas
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
        return view('guru.pages.nilai.edit', compact('nilai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'uts' => 'required|integer|min:0|max:100',
            'uas' => 'required|integer|min:0|max:100'
        ]);

        $nilai = Nilaisiswa::findOrFail($id);
        $nilai->update([
            'uts' => $request->uts,
            'uas' => $request->uas
        ]);

        return redirect()->route('guru.nilai.index')->with('success', 'Nilai berhasil diperbarui');
    }

    public function destroy($id)
    {
        $nilai = Nilaisiswa::findOrFail($id);
        $nilai->delete();

        return redirect()->route('guru.nilai.index')->with('success', 'Nilai berhasil dihapus');
    }
}
