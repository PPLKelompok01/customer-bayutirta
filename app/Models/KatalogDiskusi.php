<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogDiskusi extends Model
{
    protected $fillable = [
     'id_penjualan',
     'name',
     'isi',
     'created_at',
     'updated_at'];
}
