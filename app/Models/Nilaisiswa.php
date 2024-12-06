<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilaisiswa extends Model
{
    use HasFactory;

    protected $table = 'nilai_siswa';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_kelas',
        'nama_kelas',
        'nis',
        'nama_siswa',
        'nama_wali',
        'nama_guru', 
        'nama_mapel',
        'nama_materi_1',
        'nama_materi_2',
        'nama_materi_3',
        'nama_materi_4',
        'nama_materi_5',
        'materi_1',
        'materi_2',
        'materi_3',
        'materi_4',
        'materi_5',
        'na_materi',
        'uas',
        'uts',
        'kehadiran',
        'sikap',
        'nilai_rapor'
    ];

    protected $casts = [
        'id' => 'integer',
        'id_kelas' => 'integer',
        'nama_kelas' => 'string',
        'nis' => 'integer',
        'nama_mapel' => 'string',
        'nama_materi_1' => 'string',
        'nama_materi_2' => 'string',
        'nama_materi_3' => 'string',
        'nama_materi_4' => 'string',
        'nama_materi_5' => 'string',
        'materi_1' => 'integer',    
        'materi_2' => 'integer',
        'materi_3' => 'integer',
        'materi_4' => 'integer',
        'materi_5' => 'integer',
        'na_materi' => 'integer',
        'uas' => 'integer',
        'uts' => 'integer',
        'kehadiran' => 'integer',
        'sikap' => 'integer',
        'nilai_rapor' => 'integer'
    ];
}
