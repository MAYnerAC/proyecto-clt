<div class="modal fade" id="modalPersona" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formPersona">
            @csrf
            <input type="hidden" id="id" name="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body row g-3">
                    @foreach (['nombre', 'apellido_paterno', 'apellido_materno', 'tipo_documento', 'numero_documento', 'telefono', 'email', 'direccion', 'ubigeo'] as $campo)
                        <div class="col-md-6">
                            <label for="{{ $campo }}" class="form-label text-capitalize">
                                {{ str_replace('_', ' ', $campo) }}:
                            </label>
                            <input type="text" id="{{ $campo }}" name="{{ $campo }}"
                                class="form-control">
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>
