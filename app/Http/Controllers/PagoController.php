<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Reserva;

class PagoController extends Controller
{
    /**
     * Muestra el formulario de pago.
     */
    public function mostrarFormularioPago()
    {
        // Obtener los datos de la sesión
        $datosReserva = session('datosReserva');

        // Verifica que los datos de la reserva existan
        if (!$datosReserva) {
            return redirect()->route('datos.cliente')->with('error', 'No se encontraron datos de la reserva. Por favor, complete la reserva nuevamente.');
        }

        // Pasar los datos a la vista de pago
        return view('pago', compact('datosReserva'));
    }

    /**
     * Procesa el pago.
     */
    public function procesarPago(Request $request)
    {
        // Validar los datos de la tarjeta de crédito
        $request->validate([
            'name' => 'required|string',
            'ccnumber' => 'required|string|size:16', // Validación básica para una tarjeta de 16 dígitos
            'ccmonth' => 'required|numeric|between:1,12',
            'ccyear' => 'required|numeric|digits:4|min:' . date('Y'), // Asegura que el año sea el actual o mayor
            'cvv' => 'required|numeric|digits:3',
        ]);

        // Simulamos un pago exitoso
        // Aquí es donde se integraría una API real como Stripe, PayPal, etc.

        // Obtener los datos de la sesión
        $datosReserva = session('datosReserva');

        if ($datosReserva) {
            // Crear el cliente en la base de datos
            $cliente = Cliente::create([
                'nombres' => $datosReserva['nombre'],
                'apellidos' => $datosReserva['apellido'],
                'dui' => $datosReserva['dui'],
                'correo' => $datosReserva['email'],
                'telefono' => $datosReserva['telefono'],
                'direccion' => $datosReserva['direccion'],
            ]);

            // Crear la reserva en la base de datos
            Reserva::create([
                'id_cliente' => $cliente->id_cliente,
                'id_habitacion' => $datosReserva['id_habitacion'],
                'fecha_entrada' => $datosReserva['fecha_entrada'],
                'fecha_salida' => $datosReserva['fecha_salida'],
                'id_extra' => $datosReserva['id_extra'] ?? null,
                'total' => $datosReserva['total'],
            ]);

            // Limpiar la sesión
            session()->forget('datosReserva');

            // Redirigir a una página de confirmación de éxito
            return redirect()->route('confirmacion')->with('success', 'Pago procesado correctamente. Reserva confirmada.');
        }

        // Si no hay datos de reserva en la sesión, redirigir a la página de datos del cliente con un error
        return redirect()->route('datos.cliente')->with('error', 'Ocurrió un error con los datos de la reserva. Intente nuevamente.');
    }
}
