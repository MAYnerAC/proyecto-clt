<!--

<div class="modal fade" id="modalEspecialidad" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formEspecialidad">
        @csrf
        <input type="hidden" id="id" name="id"> {{-- Para saber si es edición o nuevo --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Especialidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="codigo_ups" class="form-label">Código UPS:</label>
                    <input type="text" id="codigo_ups" name="codigo_ups" class="form-control" maxlength="6" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </form>
  </div>
</div>

-->

<div class="modal fade" id="modalEspecialidad" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEspecialidad">
            @csrf
            <input type="hidden" id="id" name="id"> {{-- Para saber si es edición o nuevo --}}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Especialidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}"><!-- required -->
                        @error('nombre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="codigo_ups" class="form-label">Código UPS:</label>
                        <input type="text" id="codigo_ups" name="codigo_ups" class="form-control @error('codigo_ups') is-invalid @enderror" maxlength="6" value="{{ old('codigo_ups') }}"><!-- required -->
                        @error('codigo_ups')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>