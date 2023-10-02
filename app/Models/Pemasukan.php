<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'tb_pemasukan';
    protected $fillable = ['nama_pemasukan', 'nominal_pemasukan', 'tanggal_pemasukan'];
}
