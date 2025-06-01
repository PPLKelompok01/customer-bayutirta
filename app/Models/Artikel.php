<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_artikel';
    
    protected $fillable = [
        'id_artikel',
        'judul',
        'isi', 
        'nama_penulis',
        'title_penulis',
        'foto',
        'suka'
    ];

    /**
     * Relationship dengan ArtikelKomentar
     */
    public function komentars()
    {
        return $this->hasMany(ArtikelKomentar::class, 'id_artikel', 'id_artikel');
    }

    /**
     * Scope untuk artikel populer
     */
    public function scopePopular($query)
    {
        return $query->where('suka', '>', 10);
    }

    /**
     * Scope untuk artikel recent
     */
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}