<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteReservaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::get('/', [HomeController::class, 'index']);

Route::post('/buscar', [ReservaController::class, 'buscar'])->name('buscar');
Route::get('/datos-cliente', [ClienteReservaController::class, 'mostrarFormularioCliente'])->name('datos.cliente');
Route::post('/guardar-reserva', [ClienteReservaController::class, 'guardarReserva'])->name('guardar.reserva');


Route::get('/pago', function () {
    return view('pago');
});

Route::get('/mireserva', function () {
    return view('mireserva');
});