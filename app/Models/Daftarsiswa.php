<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daftarsiswa extends Model
{
    protected $table = 'daftar_siswa';

    protected $fillable = [
        'id_kelas',
        'nama_kelas',
        'nip',
        'wali_kelas',
        'jurusan',
        'daftar_siswa',
    ];

    protected $casts = [
        'daftar_siswa' => 'array',
    ];
}
