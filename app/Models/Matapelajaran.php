<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matapelajaran extends Model
{
    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'nama_guru',
        'daftar_siswa'
    ];
}