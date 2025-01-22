<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matapelajaran extends Model
{
    use HasFactory;

    protected $table = 'matapelajarans';

    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'kategori',
        'nip',
        'nama_guru'
    ];

    protected $casts = [
        'daftar_siswa' => 'array'
    ];

    // Pastikan primary key adalah 'id'
    protected $primaryKey = 'id';
}
