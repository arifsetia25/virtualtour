<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koordinate extends Model
{
    use HasFactory;

    protected $fillable = [
        'koordinat_x',
        'koordinat_y',
        'koordinat_z',
        'tipe',
        'keterangan',
        'panorama_id',
        'target',
    ];
}
