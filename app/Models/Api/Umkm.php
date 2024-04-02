<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'penjual',
        'tanggal',
        'harga',
        'telp',
        'desc',
        'gambar',
    ];
}
