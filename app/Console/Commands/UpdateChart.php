<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SensorLog;
use App\Services\FirebaseService; // pastikan kamu sudah punya service ini
use Carbon\Carbon;

class UpdateChart extends Command
{
    protected $signature = 'chart:update';
    protected $description = 'Ambil data sensor dari Firebase dan simpan ke database';

    public function handle()
    {
        $firebase = app(FirebaseService::class)->getDatabase();

        // Ambil data sensor dari Firebase
        $server_novo = $firebase->getReference("server_novo")->getValue();
        $pabx_novo = $firebase->getReference("pabx_novo")->getValue();
        $server_royal = $firebase->getReference("server_royal")->getValue();

        $now = Carbon::now();

        // Simpan ke database
        SensorLog::create([
            'lokasi' => 'server_novo',
            'suhu' => $server_novo['suhu'] ?? 0,
            'kelembapan' => $server_novo['kelembapan'] ?? 0,
            'recorded_at' => $now,
        ]);

        SensorLog::create([
            'lokasi' => 'pabx_novo',
            'suhu' => $pabx_novo['suhu'] ?? 0,
            'kelembapan' => $pabx_novo['kelembapan'] ?? 0,
            'recorded_at' => $now,
        ]);

        SensorLog::create([
            'lokasi' => 'server_royal',
            'suhu' => $server_royal['suhu'] ?? 0,
            'kelembapan' => $server_royal['kelembapan'] ?? 0,
            'recorded_at' => $now,
        ]);

        $this->info("Data sensor berhasil disimpan pada {$now}.");
    }
}
