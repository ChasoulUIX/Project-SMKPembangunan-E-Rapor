<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\Daftarnilai;
use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliNilaiController extends Controller
{
    public function index()
    {
        $daftarNilai = Daftarnilai::where('id_wali', Auth::user()->nip)
            ->with('murid')
            ->paginate(10);
            
        return view('wali.pages.nilai', compact('daftarNilai'));
    }

    public function show($id)
    {
        $nilai = Daftarnilai::where('id_wali', Auth::user()->nip)
            ->with('murid')
            ->findOrFail($id);
            
        return view('wali.pages.nilai-detail', compact('nilai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_matapelajaran' => 'required',
            'nis' => 'required',
            'nilai_harian.*' => 'nullable|numeric|min:0|max:100',
            'uts' => 'nullable|numeric|min:0|max:100',
            'uas' => 'nullable|numeric|min:0|max:100',
            'kehadiran' => 'nullable|numeric|min:0|max:100',
            'sikap' => 'nullable|string'
        ]);

        $nilai = new Daftarnilai();
        $nilai->id_wali = Auth::user()->nip;
        $nilai->nama_wali = Auth::user()->name;
        $nilai->id_matapelajaran = $request->id_matapelajaran;
        $nilai->fill($request->all());
        $nilai->save();

        return redirect()->route('wali.nilai.index')
            ->with('success', 'Nilai berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai_harian.*' => 'nullable|numeric|min:0|max:100',
            'uts' => 'nullable|numeric|min:0|max:100', 
            'uas' => 'nullable|numeric|min:0|max:100',
            'kehadiran' => 'nullable|numeric|min:0|max:100',
            'sikap' => 'nullable|string'
        ]);

        $nilai = Daftarnilai::where('id_wali', Auth::user()->nip)
            ->findOrFail($id);
        $nilai->update($request->all());

        return redirect()->route('wali.nilai.show', $id)
            ->with('success', 'Nilai berhasil diperbarui');
    }

    public function destroy($id)
    {
        $nilai = Daftarnilai::where('id_wali', Auth::user()->nip)
            ->findOrFail($id);
        $nilai->delete();

        return redirect()->route('wali.nilai.index')
            ->with('success', 'Nilai berhasil dihapus');
    }

    public function calculateAverageScore($nilai, $nis)
    {
        return $nilai->calculateAverageScore($nis);
    }

    public function calculateFinalScore($nilai, $nis) 
    {
        return $nilai->calculateFinalScore($nis);
    }
}
