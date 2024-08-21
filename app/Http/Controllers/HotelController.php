<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Pais;

class HotelController extends Controller
{
    public function index()
    {
        

        // Verificar si hay un país seleccionado
        $paisSeleccionado = session('pais_seleccionado');

        if ($paisSeleccionado) {
            // Filtrar hoteles por país
            $hoteles = Hotel::where('id_pais', $paisSeleccionado->id_pais)->get();
        } else {
            // Mostrar todos los hoteles si no hay un país seleccionado
            $hoteles = Hotel::all();
        }

        return view('home', compact('hoteles', 'paises'));
    }

}
