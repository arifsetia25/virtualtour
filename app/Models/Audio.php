<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $fillable = [
        'audio',
        'title',
        'panorama_id',

    ];

    public function panorama()
    {
        // Relasi one to many 
        // 1 panorama bisa memiliki N koordinat
        return $this->belongsTo(Panorama::class);
    }
}
