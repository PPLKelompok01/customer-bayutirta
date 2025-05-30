<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kategori',
        'perangkat',
        'masalah',
        'foto',
        'foto_base64',
        'urgensi',
        'status',
        'jawaban',
        'jawaban_at',
    ];

    protected $casts = [
        'jawaban_at' => 'datetime',
    ];

    /**
     * Get the user that owns the konsultasi.
     */
    public function user()
    {
        return $this->belongsTo(KonsultasiUser::class, 'user_id');
    }
}
