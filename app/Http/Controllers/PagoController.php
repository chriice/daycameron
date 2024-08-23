<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Habitacion;
use App\Models\Invitado;
use App\Models\Reserva;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\error;

class PagoController extends Controller
{
    /**
     * Muestra el formulario de pago.
     */
    public function mostrarFormularioPago()
    {
        // Recuperar los datos de la sesión
        $datosReserva = session('datosReserva');

        // Verificar si 'habitaciones' es un array y recuperar las habitaciones seleccionadas
        $habitaciones = [];
        if (isset($datosReserva['habitaciones']) && is_array($datosReserva['habitaciones'])) {
            $habitaciones = Habitacion::whereIn('id_habitacion', $datosReserva['habitaciones'])->get();
        }

        // Pasar los datos a la vista
        return view('pago', [
            'habitaciones' => $habitaciones, // Pasar todas las habitaciones seleccionadas
            'datosReserva' => $datosReserva
        ]);
    }


    public function procesarPago(Request $request)
    {


        // Validar los datos de la tarjeta de crédito
        $request->validate([
            'name' => 'required|string',
            'ccnumber' => 'required|string|size:16',
            'ccmonth' => 'required|numeric|between:1,12',
            'ccyear' => 'required|numeric|digits:4|min:' . date('Y'),
            'cvv' => 'required|numeric|digits:3',
        ]);

        // Recuperar los datos de las sesiones
        $datosReserva = session('datosReserva');
        $habitacionesSeleccionadas = session('habitaciones_seleccionadas', []);
        $invitados = session('invitados', []); // Aquí asegúrate de que 'invitados' es un array

        // Verificar si 'invitados' es realmente un array
        if (!is_array($invitados)) {
            Log::error('La sesión de invitados no es un array.');
            return redirect()->route('datos.cliente')->with('error', 'Error al procesar los invitados.');
        }
        // Iniciar la transacción
        DB::beginTransaction();

        try {
            $datosReserva = session('datosReserva');
            $habitacionesSeleccionadas = session('habitaciones_seleccionadas', []);
            $invitados = session('invitados', []);

            // Verificar si los datos de la sesión existen
            if (!$datosReserva) {
                Log::error('No se encontraron datos de reserva en la sesión.', []);
                return redirect()->route('datos.cliente')->with('error', 'No se encontraron datos de reserva en la sesión.');
            }

            if (empty($habitacionesSeleccionadas)) {
                Log::error('No se encontraron habitaciones seleccionadas en la sesión.', []);
                return redirect()->route('datos.cliente')->with('error', 'No se encontraron habitaciones seleccionadas en la sesión.');
            }
            if (empty(!$invitados)) {
                Log::error('No se encontro invitados agregados.', []);
                return redirect()->route('datos.cliente')->whith('error', 'nose encontraron invitados agregados');
            }

            Log::info('Datos de reserva encontrados:', [$datosReserva]);
            Log::info('Habitaciones seleccionadas:', [$habitacionesSeleccionadas]);
            Log::info('Invitados:', [$invitados]);

            // Crear el cliente en la base de datos
            $cliente = Cliente::create([
                'nombres' => $datosReserva['nombre'],
                'apellidos' => $datosReserva['apellido'],
                'dui' => $datosReserva['dui'],
                'correo' => $datosReserva['email'],
                'telefono' => $datosReserva['telefono'],
                'direccion' => $datosReserva['direccion'],
            ]);

            Log::info('Cliente creado con ID:', [$cliente->id_cliente]);

            // Crear una reserva para cada habitación seleccionada
            foreach ($habitacionesSeleccionadas as $idHabitacion) {
                Reserva::create([
                    'id_cliente' => $cliente->id_cliente,
                    'id_habitacion' => $idHabitacion,
                    'fecha_entrada' => $datosReserva['fecha_entrada'],
                    'fecha_salida' => $datosReserva['fecha_salida'],
                    'id_extra' => $datosReserva['id_extra'] ?? null,
                    'total' => $datosReserva['total'],
                ]);

                Log::info('Reserva creada para habitación ID:', [$idHabitacion]);
            }

            // Guardar los invitados en la base de datos
            $invitados = session('invitados', []);

            foreach ($invitados as $invitado) {
                DB::table('invitados')->insert([
                    'nombre' => $invitado['nombre'],
                    'edad' => $invitado['edad'],
                    'telefono' => $invitado['telefono'] ?? null,
                    'dui' => $invitado['dui'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                Log::info('Invitado guardado en la base de datos:', [$invitado]);
            }

            // Confirmar la transacción
            DB::commit();
            // Redirigir a la confirmación en caso de éxito
            return redirect()->route('confirmacion')->with('success', 'Pago procesado correctamente. Reserva confirmada.');

            // Limpiar la sesión
            session()->forget(['datosReserva', 'habitaciones_seleccionadas', 'invitados']);



            // Redirigir a una página de confirmación de éxito
            return redirect()->route('confirmacion')->with('success', 'Pago procesado correctamente. Reserva confirmada.');
        } catch (\Exception $e) {
            // Revertir la transacción si hay un error
            DB::rollBack();

            // Registrar el error en los logs
            Log::error('Error al procesar el pago:', ['error' => $e->getMessage()]);
            // Redirigir a la confirmación con un mensaje de error
            return redirect()->route('confirmacion')->with('error', 'Ocurrió un error al procesar el pago. Por favor, verifica tu información.');
        }
    }
}
