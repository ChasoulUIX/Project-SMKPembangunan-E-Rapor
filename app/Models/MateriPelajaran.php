<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriPelajaran extends Model
{
    protected $fillable = [
        'nama_guru',
        'nama_mapel',
        'materi_1',
        'materi_2',
        'materi_3',
        'materi_4',
        'materi_5'
    ];
}
