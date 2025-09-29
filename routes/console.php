<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Jadwalkan command 'chart:update' untuk dijalankan setiap 4 jam
Schedule::command('chart:update')->cron('0 */4 * * *');
// Schedule::command('chart:update')->everyFourHour();

