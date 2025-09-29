<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorLog extends Model
{
    protected $table = 'sensors';

    protected $fillable = [
        'lokasi',
        'suhu',
        'kelembapan',
        'recorded_at',
    ];

    protected $casts = [
        'recorded_at' => 'datetime',
    ];
}


