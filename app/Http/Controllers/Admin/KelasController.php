<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.pages.kelas', compact('kelas'));
    }

    public function create()
    {
        return view('admin.pages.kelas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'daftar_siswa' => 'nullable|array'
        ]);

        if ($request->has('daftar_siswa')) {
            $validated['daftar_siswa'] = json_encode($request->daftar_siswa);
        }

        Kelas::create($validated);

        return redirect()->route('admin.pages.kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan');
    }

    public function show(Kelas $kelas)
    {
        return view('admin.pages.kelas.show', compact('kelas'));
    }

    public function edit(Kelas $kelas)
    {
        return view('admin.pages.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_kelas' => 'required|string|max:255', 
            'jurusan' => 'required|string|max:255',
            'daftar_siswa' => 'nullable|array'
        ]);

        if ($request->has('daftar_siswa')) {
            $validated['daftar_siswa'] = json_encode($request->daftar_siswa);
        }

        $kelas->update($validated);

        return redirect()->route('admin.pages.kelas.index')
            ->with('success', 'Kelas berhasil diperbarui');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('admin.pages.kelas.index')
            ->with('success', 'Kelas berhasil dihapus');
    }
}
