<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;


Route::get('/', [FirebaseController::class, 'monitoring'])->name('firebase-test');

