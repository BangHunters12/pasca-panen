<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    use HasFactory;

    protected $table = 'petani'; 

    protected $primaryKey = 'id_petani';

    public $incrementing = true; // Pastikan ini true kalau ID-nya auto-increment
    protected $keyType = 'int'; // Pastikan Laravel tahu bahwa ID adalah integer
    protected $fillable = [
        'nama_petani',
        'alamat_petani',
        'username',
        'email',
        'password',
        'no_hp',
        'level',
    ];

    protected $hidden = [
        'password',
    ];
}
