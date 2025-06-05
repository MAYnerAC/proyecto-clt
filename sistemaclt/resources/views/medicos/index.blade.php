@extends('layouts.app')

@section('title', 'Listado de Médicos')

@section('content')
    <div class="mb-3 text-end">
        <button class="btn btn-success btn-nuevo-medico" data-bs-toggle="modal" data-bs-target="#modalMedico">+ Nuevo
            Médico</button>
    </div>

    <div id="tablaMedicos">
        @include('medicos.tabla')
    </div>

    @include('medicos.modal')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            function cargarTabla() {
                $.get("{{ route('medicos.index') }}", function(data) {
                    const tabla = $(data).find('#tablaMedicos').html();
                    $('#tablaMedicos').html(tabla);
                });
            }

            $('.btn-nuevo-medico').click(function() {
                $('#formMedico')[0].reset();
                $('#id').val('');
                $('.invalid-feedback').remove();
                $('.form-control').removeClass('is-invalid');
            });

            $('#formMedico').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                let id = $('#id').val();
                let url = id ? `/medicos/${id}` : `{{ route('medicos.store') }}`;
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    type: method,
                    data: form.serialize(),
                    success: function() {
                        $('#modalMedico').modal('hide');
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
                $('#id').val($(this).data('id'));
                $('#persona_id').val($(this).data('persona_id'));
                $('#cmp').val($(this).data('cmp'));
                $('#especialidad_id').val($(this).data('especialidad_id'));
                $('#modalMedico').modal('show');
            });

            $(document).on('click', '.btn-toggle', function() {
                let id = $(this).data('id');
                $.post(`/medicos/${id}/toggle`, {
                    _token: '{{ csrf_token() }}'
                }, function() {
                    cargarTabla();
                });
            });
        });
    </script>
@endpush
