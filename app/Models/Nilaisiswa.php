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
        'nis',
        'nama_siswa',
        'nama_wali',
        'nama_guru', 
        'nama_mapel',
        'uas',
        'uts'
    ];

    protected $casts = [
        'id' => 'integer',
        'nis' => 'integer',
        'nama_mapel' => 'string',
        'uas' => 'integer',
        'uts' => 'integer'
    ];
}
