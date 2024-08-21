<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;

class HabitacionController extends Controller
{
    public function index()
    {
        // Mostrar todas las habitaciones
        $habitaciones = Habitacion::all();
        return view('habitaciones.index', compact('habitaciones'));
    }

    public function mostrarDisponibles($hotelId, $fechaEntrada, $fechaSalida)
    {
        // Lógica para mostrar habitaciones disponibles
        $habitacionesDisponibles = Habitacion::where('id_hotel', $hotelId)
            ->whereDoesntHave('reservas', function ($query) use ($fechaEntrada, $fechaSalida) {
                $query->where(function ($query) use ($fechaEntrada, $fechaSalida) {
                    $query->whereBetween('fecha_entrada', [$fechaEntrada, $fechaSalida])
                        ->orWhereBetween('fecha_salida', [$fechaEntrada, $fechaSalida])
                        ->orWhere(function ($query) use ($fechaEntrada, $fechaSalida) {
                            $query->where('fecha_entrada', '<', $fechaEntrada)
                                ->where('fecha_salida', '>', $fechaSalida);
                        });
                });
            })
            ->get();

        return view('habitaciones.disponibles', compact('habitacionesDisponibles'));
    }
}
