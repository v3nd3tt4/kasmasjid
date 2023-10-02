<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'tb_pengeluaran';
    protected $fillable = ['nama_pengeluaran', 'nominal_pengeluaran', 'tanggal_pengeluaran'];
}
