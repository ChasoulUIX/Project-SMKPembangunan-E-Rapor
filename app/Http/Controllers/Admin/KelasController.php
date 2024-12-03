<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Wali;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('wali')->get();
        return view('admin.pages.kelas', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_id' => 'required|exists:walis,id',
            'jurusan' => 'required|string|max:255',
        ]);

        $wali = Wali::where('id', $validated['wali_id'])->where('role', 'wali')->first();
        if (!$wali) {
            return back()->withErrors(['wali_id' => 'Wali kelas tidak valid']);
        }

        $data = [
            'nama_kelas' => $validated['nama_kelas'],
            'jurusan' => $validated['jurusan'],
            'wali_kelas' => $wali->name,
            'wali_id' => $validated['wali_id'],
            'daftar_siswa' => json_encode([]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        Kelas::create($data);

        return redirect()->route('admin.pages.kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan');
    }

    public function show(Kelas $kelas)
    {
        return response()->json($kelas->load('wali'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_id' => 'required|exists:walis,id',
            'jurusan' => 'required|string|max:255',
        ]);

        $wali = Wali::where('id', $validated['wali_id'])->where('role', 'wali')->first();
        if (!$wali) {
            return back()->withErrors(['wali_id' => 'Wali kelas tidak valid']);
        }

        $data = [
            'nama_kelas' => $validated['nama_kelas'],
            'jurusan' => $validated['jurusan'],
            'wali_kelas' => $wali->name,
            'wali_id' => $validated['wali_id'],
            'updated_at' => Carbon::now()
        ];

        $kelas->update($data);

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
