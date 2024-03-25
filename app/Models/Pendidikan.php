<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendidikan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun_masuk',
        'tahun_selesai',
        'hari',
        'instusi',
        'perusahan',
        'jurusan',

    ];
}
