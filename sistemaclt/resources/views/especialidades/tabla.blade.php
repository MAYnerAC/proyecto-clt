<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach ($especialidades as $esp)
        <div class="col">
            <div class="card h-100 shadow-sm border-{{ $esp->activo ? 'success' : 'secondary' }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $esp->nombre }}</h5>
                    <p class="card-text mb-1"><strong>Código UPS:</strong> {{ $esp->codigo_ups }}</p>
                    <p class="card-text mb-2">
                        <span class="badge bg-{{ $esp->activo ? 'success' : 'secondary' }}">
                            {{ $esp->activo ? 'Activo' : 'Inactivo' }}
                        </span>
                    </p>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-warning btn-sm btn-editar" data-id="{{ $esp->id }}"
                            data-nombre="{{ $esp->nombre }}" data-codigo_ups="{{ $esp->codigo_ups }}">
                            Editar
                        </button>
                        <button class="btn btn-sm btn-toggle {{ $esp->activo ? 'btn-danger' : 'btn-success' }}"
                            data-id="{{ $esp->id }}">
                            {{ $esp->activo ? 'Desactivar' : 'Activar' }}
                        </button>
                    </div>
                </div>
                <div class="card-footer text-muted small text-center">
                    ID: {{ $esp->id }}
                </div>
            </div>
        </div>
    @endforeach
</div>
<br>
{{ $especialidades->links('pagination::bootstrap-5') }}


{{--

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código UPS</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($especialidades as $esp)
        <tr>
            <td>{{ $esp->id }}</td>
            <td>{{ $esp->nombre }}</td>
            <td>{{ $esp->codigo_ups }}</td>
            <td>
                @if ($esp->activo)
                <span class="badge bg-success">Activo</span>
                @else
                <span class="badge bg-secondary">Inactivo</span>
                @endif
            </td>
            <td>
                <button class="btn btn-warning btn-sm btn-editar"
                    data-id="{{ $esp->id }}"
                    data-nombre="{{ $esp->nombre }}"
                    data-codigo_ups="{{ $esp->codigo_ups }}">
                    Editar
                </button>
                <button class="btn btn-sm btn-toggle {{ $esp->activo ? 'btn-danger' : 'btn-success' }}"
                    data-id="{{ $esp->id }}">
                    {{ $esp->activo ? 'Desactivar' : 'Activar' }}
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

--}}
