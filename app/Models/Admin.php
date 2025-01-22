<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nip',
        'name', 
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    protected $attributes = [
        'password' => '',
        'role' => 'admin'
    ];
}
