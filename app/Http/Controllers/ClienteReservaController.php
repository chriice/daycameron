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

    public function agregarInvitado(Request $request)
    {
        $invitados = session('invitados', []);

        // Agregar un nuevo invitado al array
        $invitados[] = [
            'nombre' => $request->input('nombre'),
            'edad' => $request->input('edad'),
            'telefono' => $request->input('telefono', null),
            'dui' => $request->input('dui', null),
        ];

        // Guardar los invitados en la sesión
        session(['invitados' => $invitados]);

        return redirect()->back()->with('success', 'Invitado agregado correctamente.');
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
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date',
            'id_extra' => 'nullable|exists:extras,id_extra',
            'invitados' => 'nullable|array', // Validar que los invitados sean un array
            'invitados.*.nombre' => 'required|string|max:255',
            'invitados.*.edad' => 'required|integer',
            'invitados.*.telefono' => 'nullable|string|max:15',
            'invitados.*.dui' => 'nullable|string|max:10',
        ]);

        // Obtener las habitaciones seleccionadas de la sesión
        $habitacionesSeleccionadas = session('habitaciones_seleccionadas', []);

        // Calcular el total
        $total = $this->calcularTotal(
            $habitacionesSeleccionadas,
            $request->fecha_entrada,
            $request->fecha_salida,
            $request->id_extra
        );

        // Guardar los datos de la reserva en una sesión aparte
        session([
            'datosReserva' => [
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'dui' => $request->dui,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'habitaciones' => $habitacionesSeleccionadas,
                'fecha_entrada' => $request->fecha_entrada,  // Guardar la fecha de entrada
                'fecha_salida' => $request->fecha_salida,    // Guardar la fecha de salida
                'id_extra' => $request->id_extra,
                'total' => $total,
            ]
        ]);

        // Guardar los invitados en una sesión separada
        if ($request->has('invitados')) {
            session(['invitados' => $request->invitados]);
        } else {
            session()->forget('invitados'); // Si no hay invitados, limpiar la sesión de invitados
        }

        // Redirigir al formulario de pago
        return redirect()->route('mostrar.pago');
    }







    private function calcularTotal($habitacionesSeleccionadas, $fechaEntrada, $fechaSalida, $idExtra = null)
    {
        $total = 0;

        foreach ($habitacionesSeleccionadas as $idHabitacion) {
            $habitacion = Habitacion::findOrFail($idHabitacion);
            $precioPorDia = $habitacion->tipoHabitacion->precio;

            // Calcular el número de días de la reserva
            $dias = \Carbon\Carbon::parse($fechaEntrada)->diffInDays(\Carbon\Carbon::parse($fechaSalida)) + 1;

            $total += $precioPorDia * $dias;
        }

        if ($idExtra) {
            $extra = Extra::find($idExtra);
            if ($extra) {
                $total += $extra->precio;
            }
        }

        return $total;
    }
}
