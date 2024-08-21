<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function buscar(Request $request)
    {

        // Guardar los datos en la sesión
        return redirect()->route('datos.cliente')
            ->with('numero_personas', $request->input('numero_personas'));
        // Capturar los datos del formulario
        $fechaEntrada = $request->input('fecha_entrada');
        $fechaSalida = $request->input('fecha_salida');
        $numeroPersonas = $request->input('numero_personas');
        $hotelId = $request->input('hotel');

        // Realizar la consulta de disponibilidad de habitaciones
        $habitacionesDisponibles = Habitacion::where('id_hotel', $hotelId)
            ->whereDoesntHave('reservas', function ($query) use ($fechaEntrada, $fechaSalida) {
                $query->whereBetween('fecha_entrada', [$fechaEntrada, $fechaSalida])
                      ->orWhereBetween('fecha_salida', [$fechaEntrada, $fechaSalida]);
            })
            ->get();

        // Lógica para mostrar el botón "Siguiente" según el número de personas
        $mostrarBotonSiguiente = false;
        if ($numeroPersonas > 0 && $habitacionesDisponibles->count() >= ceil($numeroPersonas / 4)) {
            $mostrarBotonSiguiente = true;
        }

        return view('resultado_busqueda', compact('habitacionesDisponibles', 'mostrarBotonSiguiente', 'numeroPersonas'));
    }

    
}
