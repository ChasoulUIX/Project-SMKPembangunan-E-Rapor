<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matapelajaran;
use Illuminate\Http\Request;

class MatapelajaranController extends Controller
{
    public function index()
    {
        $matapelajarans = Matapelajaran::all();
        return view('admin.pages.matapelajaran.index', compact('matapelajarans'));
    }

    public function create()
    {
        return view('admin.pages.matapelajaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mapel' => 'required|string|max:255|unique:matapelajarans',
            'nama_mapel' => 'required|string|max:255',
            'nama_guru' => 'required|string|max:255'
        ]);

        Matapelajaran::create($validated);

        return redirect()->route('admin.matapelajaran.index')
            ->with('success', 'Mata Pelajaran berhasil ditambahkan');
    }

    public function show(Matapelajaran $matapelajaran)
    {
        return view('admin.pages.matapelajaran.show', compact('matapelajaran'));
    }

    public function edit(Matapelajaran $matapelajaran)
    {
        return view('admin.pages.matapelajaran.edit', compact('matapelajaran'));
    }

    public function update(Request $request, Matapelajaran $matapelajaran)
    {
        $validated = $request->validate([
            'kode_mapel' => 'required|string|max:255|unique:matapelajarans,kode_mapel,' . $matapelajaran->id,
            'nama_mapel' => 'required|string|max:255',
            'nama_guru' => 'required|string|max:255'
        ]);

        $matapelajaran->update($validated);

        return redirect()->route('admin.matapelajaran.index')
            ->with('success', 'Mata Pelajaran berhasil diperbarui');
    }

    public function destroy(Matapelajaran $matapelajaran)
    {
        $matapelajaran->delete();

        return redirect()->route('admin.matapelajaran.index')
            ->with('success', 'Mata Pelajaran berhasil dihapus');
    }
}
