<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panorama extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'title',

    ];

    public function coordinates()
    {
        // Relasi one to many 
        // 1 panorama bisa memiliki N koordinat
        return $this->hasMany(Koordinate::class);
    }

    public function audio()
    {
        // Relasi one to many 
        // 1 panorama bisa memiliki N koordinat
        return $this->hasMany(Audio::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Ketika panorama dihapus, hapus juga koordinat terkait
        static::deleting(function ($panorama) {
            $panorama->coordinates()->delete(); // Hapus semua data koordinat terkait
        });
    }
}
