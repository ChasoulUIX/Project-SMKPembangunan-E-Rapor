<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarmatapelajaran extends Model
{
    use HasFactory;

    protected $table = 'daftar_mapel';

    protected $fillable = [
        'id_kelas',
        'nama_kelas',
        'nama_wali',
        'jurusan',
        'nama_guru', 
        'nama_mapel',
        'daftar_siswa'
    ];

    protected $casts = [
        'daftar_siswa' => 'array'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
