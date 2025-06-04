<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;

class EspecialidadController extends Controller
{

    public function index()
    {
        $especialidades = Especialidad::all();
        return view('especialidades.index', compact('especialidades'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo_ups' => 'required|string|size:6|unique:especialidades,codigo_ups',
        ], [
            'nombre.required' => 'El nombre de la especialidad es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto válida.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            
            'codigo_ups.required' => 'El código UPS es obligatorio.',
            'codigo_ups.string' => 'El código UPS debe ser una cadena de texto.',
            'codigo_ups.size' => 'El código UPS debe tener exactamente 6 caracteres.',
            'codigo_ups.unique' => 'Este código UPS ya está registrado en el sistema.',
        ]);

        Especialidad::create([
            'nombre' => $request->nombre,
            'codigo_ups' => $request->codigo_ups,
            'activo' => true,
        ]);

        return response()->json(['ok' => true]);
    }
    /*
    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return response()->json($especialidad);
    }
*/
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo_ups' => 'required|string|size:6|unique:especialidades,codigo_ups,' . $id,
        ], [
            'nombre.required' => 'El nombre de la especialidad es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto válida.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            
            'codigo_ups.required' => 'El código UPS es obligatorio.',
            'codigo_ups.string' => 'El código UPS debe ser una cadena de texto.',
            'codigo_ups.size' => 'El código UPS debe tener exactamente 6 caracteres.',
            'codigo_ups.unique' => 'Este código UPS ya está registrado en el sistema.',
        ]);

        $esp = Especialidad::findOrFail($id);
        $esp->update([
            'nombre' => $request->nombre,
            'codigo_ups' => $request->codigo_ups,
        ]);

        return response()->json(['ok' => true]);
    }
    
    public function toggle($id)
    {
        $esp = Especialidad::findOrFail($id);
        $esp->activo = !$esp->activo;
        $esp->save();
        return response()->json(['ok' => true]);
    }
    








    /*
    public function index()
    {
        $especialidades = Especialidad::all();
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        Especialidad::create([
            'nombre' => $request->nombre,
            'activo' => true,
        ]);
    
        return redirect()->route('especialidades.index')->with('success', 'Especialidad creada correctamente.');
    }

    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidades.edit', compact('especialidad'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);
    
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->nombre = $request->nombre;
        $especialidad->save();
    
        return redirect()->route('especialidades.index');
    }
    
    public function activar($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->activo = true;
        $especialidad->save();
    
        return redirect()->route('especialidades.index');
    }
    
    public function desactivar($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->activo = false;
        $especialidad->save();
    
        return redirect()->route('especialidades.index');
    }
*/























/*
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }

*/

}
