@extends('layouts.app')

@section('title', 'Agregar Especialidad')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Nueva Especialidad</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('especialidades.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
