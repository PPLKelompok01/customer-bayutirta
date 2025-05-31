<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'id_layanan',
        'name',
        'no_telp',
        'alamat',
        'merk_hp',
        'keterangan',
        'foto',
        'status',
        'date_reservasi',
        'created_at',
        'updated_at'
    ];
}
