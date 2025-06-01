<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelKomentar extends Model
{
    use HasFactory;
    
    protected $table = 'artikel_komentars';
    protected $primaryKey = 'id_komentar';
    
    protected $fillable = [
        'id_artikel',
        'name',
        'komentar',
        'created_at',
        'updated_at'
    ];

    /**
     * Relationship dengan Artikel
     */
    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'id_artikel', 'id_artikel');
    }

    /**
     * Scope untuk komentar recent
     */
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Accessor untuk format tanggal yang user-friendly
     */
    public function getFormattedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}