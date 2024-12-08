<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Guru extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nip',
        'name',
        'email',
        'gender',
        'birth_place',
        'birth_date',
        'address',
        'phone_number',
        'photo',
        'role',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'birth_date' => 'date'
    ];

    protected $attributes = [
        'birth_place' => '',
        'birth_date' => null,
        'address' => '',
        'phone_number' => '',
        'photo' => '',
        'gender' => '',
        'role' => 'guru'
    ];

    public function matapelajarans()
    {
        return $this->hasMany(Matapelajaran::class, 'nip', 'nip');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'wali_kelas', 'nip');
    }
}
