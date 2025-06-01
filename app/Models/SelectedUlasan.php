<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectedUlasan extends Model
{
    protected $table = 'selected_ulasans';
    protected $primaryKey = 'id_ulasan';
    
    protected $fillable = [
        'rating',
        'text',
        'author_name',
        'id_displayed'
    ];
} 