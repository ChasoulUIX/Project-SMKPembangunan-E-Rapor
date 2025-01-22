<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matapelajaran extends Model
{
    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'nama_guru',
        'nip',
        'kategori',
        'daftar_siswa'
    ];

    protected $casts = [
        'daftar_siswa' => 'array'
    ];
}
