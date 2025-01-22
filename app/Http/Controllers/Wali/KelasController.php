<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Wali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
    {
        $wali = Wali::where('nip', Auth::id())->first();
        $kelas = null;
        if ($wali) {
            $kelas = Kelas::where('wali_id', $wali->id)->first();
        }
        return view('wali.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('wali.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'wali_kelas' => 'required',
            'jurusan' => 'required',
            'wali_id' => 'required|exists:walis,id'
        ]);

        Kelas::create($request->all());

        return redirect()->route('wali.kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan');
    }

    public function show(Kelas $kelas)
    {
        return view('wali.kelas.show', compact('kelas'));
    }

    public function edit(Kelas $kelas)
    {
        return view('wali.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'wali_kelas' => 'required',
            'jurusan' => 'required',
            'wali_id' => 'required|exists:walis,id'
        ]);

        $kelas->update($request->all());

        return redirect()->route('wali.kelas.index')
            ->with('success', 'Kelas berhasil diperbarui');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('wali.kelas.index')
            ->with('success', 'Kelas berhasil dihapus');
    }
}
