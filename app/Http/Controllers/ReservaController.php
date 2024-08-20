<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function buscar(Request $request)
{
    // Capturar los datos del formulario
    $fechaEntrada = $request->input('fecha_entrada');
    $fechaSalida = $request->input('fecha_salida');
    $numeroPersonas = $request->input('numero_personas');

    // Realizar la consulta de disponibilidad
    $habitacionesDisponibles = DB::table('habitaciones')
        ->leftJoin('reservaciones', function($join) use ($fechaEntrada, $fechaSalida) {
            $join->on('habitaciones.id_habitacion', '=', 'reservaciones.id_habitacion')
                 ->where(function($query) use ($fechaEntrada, $fechaSalida) {
                     $query->whereBetween('reservaciones.fecha_entrada', [$fechaEntrada, $fechaSalida])
                           ->orWhereBetween('reservaciones.fecha_salida', [$fechaEntrada, $fechaSalida])
                           ->orWhere(function($query) use ($fechaEntrada, $fechaSalida) {
                               $query->where('reservaciones.fecha_entrada', '<', $fechaEntrada)
                                     ->where('reservaciones.fecha_salida', '>', $fechaSalida);
                           });
                 });
        })
        ->whereNull('reservaciones.id_reservacion')
        ->get();

    // Debug: Verifica si la consulta trae resultados
    if ($habitacionesDisponibles->isEmpty()) {
        dd('Sin habitaciones disponibles');
        return redirect()->back()->with('error', 'No hay habitaciones disponibles para las fechas seleccionadas.');
    } else {
        dd('Habitaciones disponibles', $habitacionesDisponibles);
        return view('resultado_busqueda', compact('habitacionesDisponibles'));
    }    
}
}
