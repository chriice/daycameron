<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservaController extends Controller
{
    public function buscar(Request $request)
{
    $fechaEntrada = $request->input('fecha_entrada');
    $fechaSalida = $request->input('fecha_salida');
    $numeroPersonas = $request->input('numero_personas');

    // Realiza la consulta en la base de datos
    $habitacionesDisponibles = DB::table('habitaciones')
        ->leftJoin('reservas', function($join) use ($fechaEntrada, $fechaSalida) {
            $join->on('habitaciones.id_habitacion', '=', 'reservas.id_habitacion')
                 ->where(function($query) use ($fechaEntrada, $fechaSalida) {
                     $query->whereBetween('reservas.fecha_entrada', [$fechaEntrada, $fechaSalida])
                           ->orWhereBetween('reservas.fecha_salida', [$fechaEntrada, $fechaSalida])
                           ->orWhere(function($query) use ($fechaEntrada, $fechaSalida) {
                               $query->where('reservas.fecha_entrada', '<', $fechaEntrada)
                                     ->where('reservas.fecha_salida', '>', $fechaSalida);
                           });
                 });
        })
        ->whereNull('reservas.id_reserva')
        ->get();

    // Verifica si hay habitaciones disponibles
    if ($habitacionesDisponibles->isEmpty()) {
        return redirect()->back()->with('error', 'No hay habitaciones disponibles para las fechas seleccionadas.');
    }

    // Redirige a la vista de resultados si hay habitaciones disponibles
    return view('resultado_busqueda', compact('habitacionesDisponibles'));
}   
}

