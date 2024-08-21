<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel; // Importar el modelo Hotel

class HomeController extends Controller
{
    /**
     * Muestra la vista principal.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtener todos los hoteles desde la base de datos
        $hoteles = Hotel::all();

        // Pasar los hoteles a la vista
        return view('home', ['hoteles' => $hoteles]);
    }

    /**
     * Procesa la solicitud del formulario de la sección "Hotel + Transporte".
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processBooking(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'ciudad_origen' => 'required|string|max:255',
            'hotel' => 'required|exists:hoteles,id_hotel', // Asegúrate de que el hotel existe en la base de datos
            'fecha_entrada_salida' => 'required|string',
            'numero_personas' => 'required|integer|min:1',
        ]);

        // Aquí puedes agregar la lógica para procesar la reserva
        // Por ejemplo, guardar los datos en la base de datos o llamar a una API

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'Reserva procesada exitosamente');
        $hoteles = Hotel::all();

    }
}
