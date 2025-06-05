<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\Persona;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::paginate(10);
        return view('personas.index', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'tipo_documento' => 'required|string|max:50',
            'numero_documento' => 'required|string|max:20|unique:personas,numero_documento',
            'direccion' => 'nullable|string|max:150',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'ubigeo' => 'nullable|string|size:6',
        ]);

        Persona::create($request->all());

        return response()->json(['ok' => true]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'tipo_documento' => 'required|string|max:50',
            'numero_documento' => 'required|string|max:20|unique:personas,numero_documento,' . $id,
            'direccion' => 'nullable|string|max:150',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'ubigeo' => 'nullable|string|size:6',
        ]);

        $persona = Persona::findOrFail($id);
        $persona->update($request->all());

        return response()->json(['ok' => true]);
    }

    //
}
