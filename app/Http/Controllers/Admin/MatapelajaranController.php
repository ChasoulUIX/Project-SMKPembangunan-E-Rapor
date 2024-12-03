<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matapelajaran;
use App\Models\Guru;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MatapelajaranController extends Controller
{
    public function index()
    {
        $matapelajarans = Matapelajaran::orderBy('created_at', 'desc')->get();
        $gurus = Guru::all();
        return view('admin.pages.matapelajaran', [
            'matapelajarans' => $matapelajarans,
            'gurus' => $gurus
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel' => 'required|unique:matapelajarans',
            'nama_mapel' => 'required',
            'nip' => 'required'
        ]);

        $guru = Guru::where('nip', $request->nip)->firstOrFail();

        Matapelajaran::create([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'nama_guru' => $guru->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Mata pelajaran berhasil ditambahkan');
    }

    public function show($id)
    {
        $matapelajaran = Matapelajaran::findOrFail($id);
        $gurus = Guru::orderBy('name', 'asc')->get();
        return response()->json([
            'success' => true,
            'data' => $matapelajaran,
            'gurus' => $gurus
        ]);
    }

    public function update(Request $request, $id)
    {
        $matapelajaran = Matapelajaran::findOrFail($id);

        $request->validate([
            'kode_mapel' => 'required|unique:matapelajarans,kode_mapel,'.$id,
            'nama_mapel' => 'required',
            'nip' => 'required'
        ]);

        $guru = Guru::where('nip', $request->nip)->firstOrFail();

        $matapelajaran->update([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'nama_guru' => $guru->name,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Mata pelajaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        $matapelajaran = Matapelajaran::findOrFail($id);
        $matapelajaran->delete();

        return redirect()->back()->with('success', 'Mata pelajaran berhasil dihapus');
    }
}
