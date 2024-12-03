<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Murid extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nis',
        'nisn',
        'name',
        'email', 
        'password',
        'gender',
        'birth_place',
        'birth_date',
        'address',
        'phone_number',
        'father_name',
        'mother_name',
        'parent_phone',
        'parent_address',
        'class',
        'major',
        'academic_year',
        'semester',
        'photo',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'academic_year' => 'integer',
        'semester' => 'integer'
    ];
}
