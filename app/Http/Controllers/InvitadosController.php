<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitado;

class InvitadoController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
        ]);

        Invitado::create($data);

        return redirect()->back()->with('success', 'Invitado agregado correctamente.');
    }
}
