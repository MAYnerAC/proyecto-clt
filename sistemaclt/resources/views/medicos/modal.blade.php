<div class="modal fade" id="modalMedico" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formMedico">
            @csrf
            <input type="hidden" id="id" name="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Médico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="persona_id" class="form-label">Persona:</label>
                        <select id="persona_id" name="persona_id" class="form-select">
                            @foreach (\App\Models\Persona::all() as $persona)
                                <option value="{{ $persona->id }}">{{ $persona->nombres }} {{ $persona->apellidos }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cmp" class="form-label">CMP:</label>
                        <input type="text" id="cmp" name="cmp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="especialidad_id" class="form-label">Especialidad:</label>
                        <select id="especialidad_id" name="especialidad_id" class="form-select">
                            @foreach (\App\Models\Especialidad::where('activo', true)->get() as $esp)
                                <option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
                            @endforeach
                        </select>
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
