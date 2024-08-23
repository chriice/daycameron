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
        $extras = Extra::all(); // Obtener todos los extras disponibles

        return view('datos_cliente', compact('numeroPersonas', 'extras'));
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
            'id_habitacion' => 'required|exists:habitaciones,id_habitacion',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date',
            'id_extra' => 'nullable|exists:extras,id_extra',
        ]);

        // Calcular el total
        $total = $this->calcularTotal(
            $request->id_habitacion,
            $request->fecha_entrada,
            $request->fecha_salida,
            $request->id_extra
        );

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



    private function calcularTotal($idHabitacion, $fechaEntrada, $fechaSalida, $idExtra = null)
    {
        $habitacion = Habitacion::findOrFail($idHabitacion);
        $precioPorDia = $habitacion->tipoHabitacion->precio;

        // Calcular la cantidad de días de la reserva
        $dias = \Carbon\Carbon::parse($fechaEntrada)->diffInDays(\Carbon\Carbon::parse($fechaSalida));

        // Si las fechas son iguales, significa que es una estancia de 1 día mínimo
        if ($dias == 0) {
            $dias = 1;
        }

        // Calcular el total en función de la cantidad de días
        $total = $precioPorDia * $dias;

        if ($idExtra) {
            $extra = Extra::find($idExtra);
            if ($extra) {
                $total += $extra->precio;
            }
        }

        return $total;
    }
}
