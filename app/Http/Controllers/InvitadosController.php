<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitadoController extends Controller
{
    public function agregarInvitado(Request $request)
    {
        // Validar los datos del invitado
        $request->validate([
            'nombre_invitado' => 'required|string|max:255',
            'edad_invitado' => 'required|integer|min:0',
            'telefono_invitado' => 'nullable|string|max:15',
            'dui_invitado' => 'nullable|string|max:10',
        ]);

        // Obtener los datos de los invitados desde la sesión, o inicializar un arreglo vacío
        $invitados = session('invitados', []);

        // Agregar el nuevo invitado al arreglo
        $invitados[] = [
            'nombre' => $request->input('nombre_invitado'),
            'edad' => $request->input('edad_invitado'),
            'telefono' => $request->input('telefono_invitado'),
            'dui' => $request->input('dui_invitado'),
        ];

        // Guardar el arreglo de invitados en la sesión
        session(['invitados' => $invitados]);

        // Redirigir de nuevo al formulario con un mensaje de éxito
        return redirect()->back()->with('success', 'Invitado agregado correctamente.');
    }
}

