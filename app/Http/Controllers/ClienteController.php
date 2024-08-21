<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Reserva;

class ClienteController extends Controller
{
    public function mostrarFormularioCliente()
    {
        // Aquí puedes pasar cualquier dato necesario a la vista
        return view('cliente.formulario');
    }

    public function guardarCliente(Request $request)
    {
        // Aquí puedes validar y guardar los datos del cliente
        $validatedData = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dui' => 'required|string|size:10|unique:clientes',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|size:1',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|string|email|max:255|unique:clientes',
            'direccion' => 'required|string|max:255',
            // Añadir más validaciones si es necesario
        ]);

        // Crear el cliente en la base de datos
        $cliente = Cliente::create($validatedData);

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->route('resumen.reserva')->with('success', 'Cliente registrado exitosamente.');
    }
}
