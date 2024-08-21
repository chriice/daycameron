<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::get('/', [HomeController::class, 'index']);



Route::post('/buscar', [ReservaController::class, 'buscar'])->name('buscar');

