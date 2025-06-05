<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre completo</th>
                <th>Tipo/NroDoc</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Ubigeo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
                <tr>
                    <td>{{ $persona->id }}</td>
                    <td>{{ $persona->nombre }} {{ $persona->apellido_paterno }} {{ $persona->apellido_materno }}</td>
                    <td>{{ $persona->tipo_documento }}/{{ $persona->numero_documento }}</td>
                    <td>{{ $persona->telefono }}</td>
                    <td>{{ $persona->email }}</td>
                    <td>{{ $persona->direccion }}</td>
                    <td>{{ $persona->ubigeo }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning btn-editar"
                            @foreach (['id', 'nombre', 'apellido_paterno', 'apellido_materno', 'tipo_documento', 'numero_documento', 'telefono', 'email', 'direccion', 'ubigeo'] as $field)
                                data-{{ $field }}="{{ $persona->$field }}" @endforeach>
                            Editar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $personas->links('pagination::bootstrap-5') }}
