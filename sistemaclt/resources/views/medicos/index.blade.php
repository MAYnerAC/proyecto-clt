@extends('layouts.app') {{-- Usa tu layout base --}}

@section('title', 'Listado de Especialidades')

@section('content')
    <div class="mb-3 text-end">
        <button class="btn btn-success btn-nueva-especialidad" data-bs-toggle="modal" data-bs-target="#modalEspecialidad">+ Nueva Especialidad</button>
    </div>

    {{-- Aquí se carga dinámicamente la tabla --}}
    <div id="tablaEspecialidades">
        @include('especialidades.tabla')
    </div>

    {{-- Modal para crear/editar --}}
    @include('especialidades.modal')
@endsection





@push('scripts')
<script>
$(document).ready(function () {
    // Cargar tabla actualizada
    function cargarTabla() {
        $.get("{{ route('especialidades.index') }}", function (data) {
            const tabla = $(data).find('#tablaEspecialidades').html();
            $('#tablaEspecialidades').html(tabla);
        });
    }

    // Limpiar los campos al hacer clic en el botón "Nuevo"
    $('.btn-nueva-especialidad').click(function () {
        $('#formEspecialidad')[0].reset(); // Limpiamos los campos del formulario
        $('#id').val(''); // Aseguramos que el ID esté vacío para crear una nueva especialidad
        $('.invalid-feedback').remove(); // Limpiar errores previos
        $('.form-control').removeClass('is-invalid'); // Quitar las clases de error
    });

    // Guardar nueva o editar
    $('#formEspecialidad').submit(function (e) {
        e.preventDefault();
        let form = $(this);
        let id = $('#id').val();
        let url = id ? `/especialidades/${id}` : `{{ route('especialidades.store') }}`;
        let method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: form.serialize(),
            success: function () {
                $('#modalEspecialidad').modal('hide');
                cargarTabla();
            },
            error: function (response) {
                // Limpiar errores previos
                $('.invalid-feedback').remove();
                $('.form-control').removeClass('is-invalid');
                
                // Mostrar errores de validación
                let errors = response.responseJSON.errors;
                $.each(errors, function (field, messages) {
                    let input = $('input[name=' + field + ']');
                    input.addClass('is-invalid');
                    input.siblings('.invalid-feedback').remove();
                    input.after('<div class="invalid-feedback">' + messages[0] + '</div>');
                });
            }
        });
    });

    // Botón Editar
    $(document).on('click', '.btn-editar', function () {
        let id = $(this).data('id');
        let nombre = $(this).data('nombre');
        let codigo_ups = $(this).data('codigo_ups');
        $('#id').val(id);
        $('#nombre').val(nombre);
        $('#codigo_ups').val(codigo_ups);
        $('#modalEspecialidad').modal('show');
    });

    // Botón Activar/Inactivar
    $(document).on('click', '.btn-toggle', function () {
        let id = $(this).data('id');
        $.post(`/especialidades/${id}/toggle`, {_token: '{{ csrf_token() }}'}, function () {
            cargarTabla();
        });
    });
});
</script>
@endpush





{{--



@push('scripts')
<script>
$(document).ready(function () {
    // Cargar tabla actualizada
    function cargarTabla() {
        $.get("{{ route('especialidades.index') }}", function (data) {
            const tabla = $(data).find('#tablaEspecialidades').html();
            $('#tablaEspecialidades').html(tabla);
        });
    }

    // Limpiar los campos al hacer clic en el botón "Nuevo"
    $('.btn-nueva-especialidad').click(function () {
        $('#formEspecialidad')[0].reset(); // Limpiamos los campos del formulario
        $('#id').val(''); // Aseguramos que el ID esté vacío para crear una nueva especialidad
    });

    // Guardar nueva o editar
    $('#formEspecialidad').submit(function (e) {
        e.preventDefault();
        let form = $(this);
        let id = $('#id').val();
        let url = id ? `/especialidades/${id}` : `{{ route('especialidades.store') }}`;
        let method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: form.serialize(),
            success: function () {
                $('#modalEspecialidad').modal('hide');
                cargarTabla();
            }
        });
    });

    // Botón Editar
    $(document).on('click', '.btn-editar', function () {
        let id = $(this).data('id');
        let nombre = $(this).data('nombre');
        let codigo_ups = $(this).data('codigo_ups');
        $('#id').val(id);
        $('#nombre').val(nombre);
        $('#codigo_ups').val(codigo_ups);
        $('#modalEspecialidad').modal('show');
    });

    // Botón Activar/Inactivar
    $(document).on('click', '.btn-toggle', function () {
        let id = $(this).data('id');
        $.post(`/especialidades/${id}/toggle`, {_token: '{{ csrf_token() }}'}, function () {
            cargarTabla();
        });
    });
});
</script>
@endpush



 --}}