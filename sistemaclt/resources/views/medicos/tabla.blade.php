<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach ($medicos as $med)
        <div class="col">
            <div class="card h-100 shadow-sm border-{{ $med->activo ? 'success' : 'secondary' }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $med->persona->nombres }} {{ $med->persona->apellidos }}</h5>
                    <p class="card-text mb-1"><strong>CMP:</strong> {{ $med->cmp }}</p>
                    <p class="card-text mb-1"><strong>Especialidad:</strong> {{ $med->especialidad->nombre }}</p>
                    <p class="card-text mb-2">
                        <span class="badge bg-{{ $med->activo ? 'success' : 'secondary' }}">
                            {{ $med->activo ? 'Activo' : 'Inactivo' }}
                        </span>
                    </p>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-warning btn-sm btn-editar" data-id="{{ $med->id }}"
                            data-persona_id="{{ $med->persona_id }}" data-cmp="{{ $med->cmp }}"
                            data-especialidad_id="{{ $med->especialidad_id }}">
                            Editar
                        </button>
                        <button class="btn btn-sm btn-toggle {{ $med->activo ? 'btn-danger' : 'btn-success' }}"
                            data-id="{{ $med->id }}">
                            {{ $med->activo ? 'Desactivar' : 'Activar' }}
                        </button>
                    </div>
                </div>
                <div class="card-footer text-muted small text-center">
                    ID: {{ $med->id }}
                </div>
            </div>
        </div>
    @endforeach
</div>
<br>
{{ $medicos->links('pagination::bootstrap-5') }}
