<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use App\Models\Medico;
use App\Models\Persona;
use App\Models\Especialidad;

class MedicoController extends Controller
{

    public function index()
    {
        $medicos = Medico::with(['persona', 'especialidad'])->paginate(10);
        return view('medicos.index', compact('medicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'cmp' => 'required|string|max:20|unique:medicos,cmp',
            'especialidad_id' => 'required|exists:especialidades,id',
        ]);

        Medico::create([
            'persona_id' => $request->persona_id,
            'cmp' => $request->cmp,
            'especialidad_id' => $request->especialidad_id,
            'activo' => true,
        ]);

        return response()->json(['ok' => true]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'cmp' => 'required|string|max:20|unique:medicos,cmp,' . $id,
            'especialidad_id' => 'required|exists:especialidades,id',
        ]);

        $medico = Medico::findOrFail($id);
        $medico->update([
            'persona_id' => $request->persona_id,
            'cmp' => $request->cmp,
            'especialidad_id' => $request->especialidad_id,
        ]);

        return response()->json(['ok' => true]);
    }

    public function toggle($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->activo = !$medico->activo;
        $medico->save();
        return response()->json(['ok' => true]);
    }

    //
}
