<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        'wali_kelas', 
        'jurusan',
        'wali_id'
    ];

    public function wali()
    {
        return $this->belongsTo(Wali::class, 'wali_id');
    }

    public function murid()
    {
        return $this->hasMany(Murid::class, 'kelas_id');
    }
}
