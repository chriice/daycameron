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
        session([
            'fecha_entrada' => $request->input('fecha_entrada'),
            'fecha_salida' => $request->input('fecha_salida'),
            'numero_personas' => $request->input('numero_personas'),
            'hotel' => $request->input('hotel')
        ]);

        $fechaEntrada = $request->input('fecha_entrada');
        $fechaSalida = $request->input('fecha_salida');
        $numeroPersonas = $request->input('numero_personas'); // Capturar el número de personas
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

        // Pasar $numeroPersonas a la vista junto con las habitaciones disponibles
        return view('resultado_busqueda', compact('habitacionesDisponibles', 'mostrarBotonSiguiente', 'numeroPersonas'));
    }


    public function guardarHabitacion(Request $request)
    {
        $request->validate([
            'id_habitacion' => 'required|array', // Asegurarse de que sea un array
            'id_habitacion.*' => 'exists:habitaciones,id_habitacion', // Validar cada ID de habitación
        ]);
    
        // Guardar el array de habitaciones seleccionadas en la sesión
        session(['habitaciones_seleccionadas' => $request->id_habitacion]);
    
        return response()->json(['message' => 'Habitaciones guardadas en la sesión.'], 200);
    }
    
}
