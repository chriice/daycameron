<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Extra;
use App\Models\Habitacion;

class ClienteReservaController extends Controller
{
    // Luego, en ClienteReservaController, puedes acceder a esos datos así:
    public function mostrarFormularioCliente()
    {
        // Obtener los datos de la sesión
        $numeroPersonas = session('numero_personas');

    return view('datos_cliente', compact('numeroPersonas'));
    }

    public function guardarReserva(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_habitacion' => 'required|exists:habitaciones,id_habitacion',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date',
            'id_extra' => 'nullable|exists:extras,id_extra',
        ]);

        $reserva = Reserva::create([
            'id_cliente' => $request->id_cliente,
            'id_habitacion' => $request->id_habitacion,
            'fecha_entrada' => $request->fecha_entrada,
            'fecha_salida' => $request->fecha_salida,
            'id_extra' => $request->id_extra,
            'total' => $this->calcularTotal($request->id_habitacion, $request->id_extra),
        ]);

        return redirect()->route('reservas.index')->with('success', 'Reserva realizada exitosamente');
    }

    private function calcularTotal($idHabitacion, $idExtra = null)
    {
        $habitacion = Habitacion::findOrFail($idHabitacion);
        $total = $habitacion->tipoHabitacion->precio;

        if ($idExtra) {
            $extra = Extra::findOrFail($idExtra);
            $total += $extra->precio;
        }

        return $total;
    }
}
