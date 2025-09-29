<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\SensorLog;
use Illuminate\Http\Request;
use App\Services\FirebaseService;
use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class FirebaseController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase->getDatabase();
    }

    public function monitoring(LarapexChart $larapexChart)
    {
        // =================================================
        // ==== Menampilkan data realtime dari Firebase ====
        // =================================================
        $dataServerNovo = $this->firebase->getReference("server_novo")->getValue();
        $dataPabxNovo = $this->firebase->getReference("pabx_novo")->getValue();
        $dataServerRoyal = $this->firebase->getReference("server_royal")->getValue();

        // dd($serverNovo, $pabxNovo, $sensorRoyal);


        // ====================================
        // ==== Ambil data 5 hari terakhir ====
        // ====================================
        $now = Carbon::now();
        $startDate = $now->copy()->subDays(5);


        // ====================================
        // ====== Ambil data per lokasi =======
        // ====================================
        $data = SensorLog::whereBetween('recorded_at', [$startDate, $now])
            ->orderBy('recorded_at')
            ->get()
            ->groupBy('lokasi');

        // ====================================
        // ==== Grafik untuk setiap lokasi ====
        // ====================================

        // === SERVER NOVO ===
        $serverNovo = $data['server_novo'] ?? collect();
        $labelsNovo = $serverNovo->pluck('recorded_at')->map(fn($d) => $d->format('d-m H:i'))->toArray();
        $suhuNovo   = $serverNovo->pluck('suhu')->toArray();
        $humNovo    = $serverNovo->pluck('kelembapan')->toArray();

        $chartServerNovo = $larapexChart->areaChart()
            ->setTitle('Server Novo - Monitoring 5 Hari')
            ->setSubtitle('Update tiap 4 jam')
            ->addData('Suhu (°C)', $suhuNovo)
            ->addData('Kelembapan (%)', $humNovo)
            ->setFontFamily('Poppins')
            ->setXAxis($labelsNovo)
            ->setFontFamily('Poppins')
            ->setGrid(true);

        // === PABX NOVO ===
        $pabxNovo = $data['pabx_novo'] ?? collect();
        $labelsPabx = $pabxNovo->pluck('recorded_at')->map(fn($d) => $d->format('d-m H:i'))->toArray();
        $suhuPabx   = $pabxNovo->pluck('suhu')->toArray();
        $humPabx    = $pabxNovo->pluck('kelembapan')->toArray();

        $chartPabxNovo = $larapexChart->areaChart()
            ->setTitle('PABX Novo - Monitoring 5 Hari')
            ->setSubtitle('Update tiap 4 jam')
            ->addData('Suhu (°C)', $suhuPabx)
            ->addData('Kelembapan (%)', $humPabx)
            ->setXAxis($labelsPabx)
            ->setFontFamily('Poppins')
            ->setGrid(true);


        // === SERVER ROYAL ===
        $serverRoyal = $data['server_royal'] ?? collect();
        $labelsRoyal = $serverRoyal->pluck('recorded_at')->map(fn($d) => $d->format('d-m H:i'))->toArray();
        $suhuRoyal   = $serverRoyal->pluck('suhu')->toArray();
        $humRoyal    = $serverRoyal->pluck('kelembapan')->toArray();

        $chartServerRoyal = $larapexChart->areaChart()
            ->setTitle('Server Royal - Monitoring 5 Hari')
            ->setSubtitle('Update tiap 4 jam')
            ->addData('Suhu (°C)', $suhuRoyal)
            ->addData('Kelembapan (%)', $humRoyal)
            ->setXAxis($labelsRoyal)
            ->setFontFamily('Poppins')
            ->setGrid(true);

        // =================================================
        // ==== Kirim data ke view untuk ditampilkan ======
        // =================================================

        return view('firebase.index2', compact('dataServerNovo','dataPabxNovo','dataServerRoyal','now','chartServerNovo','chartPabxNovo','chartServerRoyal'));
    }
}



