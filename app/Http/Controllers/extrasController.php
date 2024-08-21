<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extra;

class ExtrasController extends Controller
{
    public function index()
    {
        $extras = Extra::all();
        return view('extras.index', compact('extras'));
    }

    public function create()
    {
        return view('extras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ]);

        Extra::create($request->all());

        return redirect()->route('extras.index')->with('success', 'Extra creado exitosamente');
    }

    public function edit($id)
    {
        $extra = Extra::findOrFail($id);
        return view('extras.edit', compact('extra'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ]);

        $extra = Extra::findOrFail($id);
        $extra->update($request->all());

        return redirect()->route('extras.index')->with('success', 'Extra actualizado exitosamente');
    }

    public function destroy($id)
    {
        $extra = Extra::findOrFail($id);
        $extra->delete();

        return redirect()->route('extras.index')->with('success', 'Extra eliminado exitosamente');
    }
}
