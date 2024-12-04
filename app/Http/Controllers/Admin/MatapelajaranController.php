<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matapelajaran;
use Illuminate\Http\Request;

class MatapelajaranController extends Controller
{
    public function index()
    {
        $matapelajarans = Matapelajaran::select('id', 'kode_mapel', 'nama_mapel', 'nama_guru', 'daftar_siswa')
            ->orderBy('kode_mapel')
            ->get();
        return view('admin.pages.matapelajaran', compact('matapelajarans'));
    }

    public function show(Matapelajaran $matapelajaran)
    {
        return view('admin.pages.matapelajaran.show', compact('matapelajaran'));
    }

    public function create()
    {
        return view('admin.pages.matapelajaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mapel' => 'required|unique:matapelajarans',
            'nama_mapel' => 'required',
            'nama_guru' => 'required',
            'daftar_siswa' => 'nullable'
        ]);

        Matapelajaran::create($validated);

        return redirect()->route('admin.pages.matapelajaran')->with('success', 'Mata pelajaran berhasil ditambahkan');
    }

    public function edit(Matapelajaran $matapelajaran)
    {
        return view('admin.pages.matapelajaran.edit', compact('matapelajaran'));
    }

    public function update(Request $request, Matapelajaran $matapelajaran)
    {
        $validated = $request->validate([
            'kode_mapel' => 'required|unique:matapelajarans,kode_mapel,' . $matapelajaran->id,
            'nama_mapel' => 'required',
            'nama_guru' => 'required',
            'daftar_siswa' => 'nullable'
        ]);

        $matapelajaran->update($validated);

        return redirect()->route('admin.pages.matapelajaran')->with('success', 'Mata pelajaran berhasil diperbarui');
    }

    public function destroy(Matapelajaran $matapelajaran)
    {
        $matapelajaran->delete();

        return redirect()->route('admin.pages.matapelajaran')->with('success', 'Mata pelajaran berhasil dihapus');
    }
}
