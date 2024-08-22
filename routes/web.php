<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteReservaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitadoController;
use App\Http\Controllers\PagoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::get('/', [HomeController::class, 'index']);

Route::post('/buscar', [ReservaController::class, 'buscar'])->name('buscar');
Route::post('/guardar-habitacion', [ReservaController::class, 'guardarHabitacion'])->name('guardar.habitacion');

Route::get('/datos-cliente', [ClienteReservaController::class, 'mostrarFormularioCliente'])->name('datos.cliente');
Route::post('/guardar-reserva', [ClienteReservaController::class, 'guardarReserva'])->name('guardar.reserva');
Route::get('/pago', [PagoController::class, 'mostrarFormularioPago'])->name('mostrar.pago');
Route::post('/procesar-pago', [PagoController::class, 'procesarPago'])->name('procesar.pago');

// Confirmación después del pago exitoso
Route::get('/confirmacion', function () {
    return view('confirmacion');
})->name('confirmacion');

