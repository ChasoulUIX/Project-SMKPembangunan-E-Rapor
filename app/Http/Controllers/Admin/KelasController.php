<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Wali;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        // Remove relationship load since 'wali' relationship is not defined
        $kelas = Kelas::all();
        return view('admin.pages.kelas', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_id' => 'required|exists:walis,nip',
            'jurusan' => 'required|string|max:255',
        ]);

        $wali = Wali::select('id', 'name')->where('nip', $validated['wali_id'])->first();
        $validated['wali_id'] = $wali->id;
        $validated['wali_name'] = $wali->name;

        Kelas::create($validated);

        return redirect()->route('admin.pages.kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan');
    }

    public function show(Kelas $kelas)
    {
        // Remove relationship load since 'wali' relationship is not defined
        return response()->json($kelas);
    }

    public function update(Request $request, Kelas $kelas)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255', 
            'wali_id' => 'required|exists:walis,nip',
            'jurusan' => 'required|string|max:255',
        ]);

        $wali = Wali::select('id', 'name')->where('nip', $validated['wali_id'])->first();
        $validated['wali_id'] = $wali->id;
        $validated['wali_name'] = $wali->name;

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
