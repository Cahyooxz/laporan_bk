<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn_or_nip',
        'jk',
        'kelas',
        'no_absen',
        'jurusan',
    ];
    protected $table = 'profile_siswas';
}
