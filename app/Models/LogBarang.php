<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogBarang extends Model
{
    protected $fillable = [
    'nama_barang',
    'kategori',
    'deskripsi',
    'aksi',
    ];
}
