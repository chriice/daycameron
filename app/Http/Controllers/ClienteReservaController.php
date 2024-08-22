<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Extra;
use App\Models\Habitacion;
use App\Models\TipoHabitacion;



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
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dui' => 'required|string|max:10',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'required|string|max:255',
            // Datos de la habitación y reserva
            'id_habitacion' => 'required|exists:habitaciones,id_habitacion',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date',
            'id_extra' => 'nullable|exists:extras,id_extra',
        ]);

        // Calcular el total
        $total = $this->calcularTotal($request->id_habitacion, $request->id_extra);

        // Guardar los datos de la reserva y del cliente en la sesión
        session([
            'datosReserva' => [
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'dui' => $request->dui,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'id_habitacion' => $request->id_habitacion,
                'fecha_entrada' => $request->fecha_entrada,
                'fecha_salida' => $request->fecha_salida,
                'id_extra' => $request->id_extra,
                'total' => $total,
            ]
        ]);

        // Redirigir al formulario de pago
        return redirect()->route('mostrar.pago')->with('success', 'Datos de reserva guardados. Procede al pago.');
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
