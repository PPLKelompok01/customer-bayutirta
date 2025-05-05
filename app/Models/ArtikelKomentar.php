<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelKomentar extends Model
{
    protected $fillable = [
        'id_artikel',
        'name',
        'komentar',
        'created_at',
        'updated_at'
    ];
}
