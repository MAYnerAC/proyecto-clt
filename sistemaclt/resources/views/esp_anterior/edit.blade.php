@extends('layouts.app')

@section('title', 'Editar Especialidad')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Editar Especialidad</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('especialidades.update', $especialidad->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="nombre" value="{{ $especialidad->nombre }}" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Guardar cambios</button>
                <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
