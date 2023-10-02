<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_profil_masjid extends Model
{
    use HasFactory;
    protected $table = 'tb_profil_masjid';
    protected $fillable = ['nama_masjid', 'alamat_masjid'];
}
