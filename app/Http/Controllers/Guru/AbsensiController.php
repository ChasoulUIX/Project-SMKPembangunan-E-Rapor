<?php

namespace App\Http\Controllers\Guru;

use App\Models\NilaiSiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsensiController extends Controller
{
    public function index()
    {
        $nilaiSiswa = NilaiSiswa::with(['siswa', 'kelas'])
            ->where('guru_id', auth()->user()->id)
            ->get();
        
        $kelas = Kelas::whereHas('nilaiSiswa', function($query) {
            $query->where('guru_id', auth()->user()->id);
        })->get();

        return view('guru.pages.absensi', compact('nilaiSiswa', 'kelas'));
    }

    public function update(Request $request)
    {
        try {
            $attendanceData = $request->input('data');
            
            foreach ($attendanceData as $data) {
                $nilai = NilaiSiswa::find($data['nilai_id']);
                if ($nilai) {
                    // Update attendance data
                    $nilai->update($data['attendance']);
                    
                    // Calculate total attendance percentage
                    $totalPertemuan = 16;
                    $totalHadir = collect($data['attendance'])->sum();
                    $kehadiranPersen = ($totalHadir / $totalPertemuan) * 100;
                    
                    // Update kehadiran value
                    $nilai->update([
                        'kehadiran' => round($kehadiranPersen)
                    ]);
                }
            }
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
