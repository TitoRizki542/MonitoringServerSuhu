<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->enum('lokasi', ['server_novo', 'pabx_novo', 'server_royal'])->nullable();
            $table->float('suhu')->nullable();
            $table->float('kelembapan')->nullable();
            $table->timestamp('recorded_at')->index(); // waktu dari Firebase
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};
