<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Daftarnilai extends Model
{
    use HasFactory;
    
    protected $table = 'daftar_nilai';

    protected $fillable = [
        'id_wali',
        'nama_wali', 
        'id_matapelajaran',
        'nama_pelajaran',
        'id_guru',
        'nama_guru',
        'daftar_siswa',
        'nilai_harian1',
        'nilai_harian2', 
        'nilai_harian3',
        'nilai_harian4',
        'nilai_harian5',
        'rata_rata',
        'uts',
        'uas',
        'kehadiran',
        'sikap'
    ];

    protected $casts = [
        'daftar_siswa' => 'array',
        'nilai_harian1' => 'array',
        'nilai_harian2' => 'array',
        'nilai_harian3' => 'array', 
        'nilai_harian4' => 'array',
        'nilai_harian5' => 'array',
        'uts' => 'array',
        'uas' => 'array',
        'kehadiran' => 'array',
        'sikap' => 'array'
    ];

    public function calculateAverageScore($nis)
    {
        $nilaiHarian = [
            $this->nilai_harian1[$nis] ?? 0,
            $this->nilai_harian2[$nis] ?? 0, 
            $this->nilai_harian3[$nis] ?? 0,
            $this->nilai_harian4[$nis] ?? 0,
            $this->nilai_harian5[$nis] ?? 0
        ];

        $filteredNilai = array_filter($nilaiHarian);
        return !empty($filteredNilai) ? array_sum($filteredNilai) / count($filteredNilai) : 0;
    }

    public function calculateFinalScore($nis) 
    {
        $rataRata = $this->calculateAverageScore($nis);
        $uts = $this->uts[$nis] ?? 0;
        $uas = $this->uas[$nis] ?? 0;

        return ($rataRata * 0.4) + ($uts * 0.3) + ($uas * 0.3);
    }
}
