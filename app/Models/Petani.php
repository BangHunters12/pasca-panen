<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petani extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;
    protected $table = 'petani'; 

    protected $fillable = [
        'nama_lengkap',
        'username',
        'gender',
        'email',
        'no_telp',
        'alamat',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
