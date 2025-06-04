@extends('layouts.app')

@section('title', 'Listado de Especialidades')

@section('content')

    <div class="mb-3 text-end">
        <a href="{{ route('especialidades.create') }}" class="btn btn-success">+ Agregar Especialidad</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Especialidades Médicas</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Especialidad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($especialidades as $esp)
                        <tr>
                            <td>{{ $esp->id }}</td>
                            <td>{{ $esp->nombre }}</td>
                            <td>
                                @if ($esp->activo)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('especialidades.edit', $esp->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                @if ($esp->activo)
                                    <form action="{{ route('especialidades.desactivar', $esp->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-danger btn-sm">Desactivar</button>
                                    </form>
                                @else
                                    <form action="{{ route('especialidades.activar', $esp->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-primary btn-sm">Activar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
