<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $table = "penjualans";
    protected $fillable = [
        'judul',
        'kategori',
        'harga',
        'stok',
        'deskripsi',
        'foto',
        'created_at',
        'updated_at'
    ];
}
