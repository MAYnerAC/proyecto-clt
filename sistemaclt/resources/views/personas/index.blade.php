@extends('layouts.app')

@section('title', 'Listado de Personas')

@section('content')

    <div class="text-center mb-4">
        <h2 class="text-uppercase fw-bold text-danger">GESTIÓN DE PERSONAS</h2>
    </div>

    <div class="mb-3 text-end">
        <button class="btn btn-success btn-nueva-persona" data-bs-toggle="modal" data-bs-target="#modalPersona">
            + Nueva Persona
        </button>
    </div>

    <div id="tablaPersonas">
        @include('personas.tabla')
    </div>

    @include('personas.modal')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            function cargarTabla() {
                $.get("{{ route('personas.index') }}", function(data) {
                    const tabla = $(data).find('#tablaPersonas').html();
                    $('#tablaPersonas').html(tabla);
                });
            }

            $('.btn-nueva-persona').click(function() {
                $('#formPersona')[0].reset();
                $('#id').val('');
                $('.invalid-feedback').remove();
                $('.form-control').removeClass('is-invalid');
            });

            $('#formPersona').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                let id = $('#id').val();
                let url = id ? `/personas/${id}` : `{{ route('personas.store') }}`;
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: method,
                    data: form.serialize(),
                    success: function() {
                        $('#modalPersona').modal('hide');
                        cargarTabla();
                    },
                    error: function(response) {
                        $('.invalid-feedback').remove();
                        $('.form-control').removeClass('is-invalid');

                        let errors = response.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            let input = $('[name=' + field + ']');
                            input.addClass('is-invalid');
                            input.after('<div class="invalid-feedback">' + messages[0] +
                                '</div>');
                        });
                    }
                });
            });

            $(document).on('click', '.btn-editar', function() {
                let data = $(this).data();
                $('#id').val(data.id);
                $('#nombre').val(data.nombre);
                $('#apellido_paterno').val(data.apellido_paterno);
                $('#apellido_materno').val(data.apellido_materno);
                $('#tipo_documento').val(data.tipo_documento);
                $('#numero_documento').val(data.numero_documento);
                $('#telefono').val(data.telefono);
                $('#email').val(data.email);
                $('#direccion').val(data.direccion);
                $('#ubigeo').val(data.ubigeo);
                $('#modalPersona').modal('show');
            });

        });
    </script>
@endpush
