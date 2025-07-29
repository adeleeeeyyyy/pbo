<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    protected $fillable = [
        'tanggal',
        'jam',
        'lokasi',
        'suhu_tubuh',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
        'jam' => 'time',
    ];
}
