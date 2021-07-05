<div wire:ignore.self class="modal fade" id="modalSolicitud" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear nueva solicitud</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="prioridad" class="form-label">Prioridad</label>
                    <input type="number" min="0" max="10" name="prioridad" class="form-control" wire:model="prioridad">
                    @error('prioridad')
                        <span class="text-danger fw-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="problema" class="form-label">Problema</label>
                    <select wire:model="problema" name="problema" class="form-control">
                        <option value="">--Selecciona un problema--</option>
                        @foreach ($problemas as $problema)
                            <option value="{{ $problema->id }}">{{ $problema->nombre }}</option>
                        @endforeach
                    </select>
                    @error('problema')
                        <span class="text-danger fw-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="problema" class="form-label">Operacion</label>
                    <input type="text" class="form-control" wire:model="operacion">
                    @error('operacion')
                        <span class="text-danger fw-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Módulo</label>
                    <input type="text" class="form-control" wire:model="modulo">
                    @error('modulo')
                        <span class="text-danger fw-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Máquina</label>
                    <select wire:model="maquina" class="form-control">
                        <option value="">--Selecciona un máquina--</option>
                        @foreach ($maquinas as $maquina)
                            <option value="{{ $maquina->id }}">Máquina  {{ $maquina->id }}</option>
                        @endforeach
                    </select>
                    @error('maquina')
                        <span class="text-danger fw-bold">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                @if ($solicitud)
                    <button type="button" class="btn btn-primary" wire:click.prevent="actualizarBitacora">Actualizar</button>
                @else
                    <button type="button" class="btn btn-primary" wire:click.prevent="crearSolicitud">Crear</button>
                @endif
            </div>
        </form>
    </div>
</div>

<script>
    var myModal;
    Livewire.on('mostrarModalCrearSolicitud', () => {
        myModal = new bootstrap.Modal(document.getElementById('modalSolicitud'), {});
        myModal.show();
    });

    document.getElementById('modalSolicitud').addEventListener('hidden.bs.modal', function(event) {
        Livewire.emit('resetearErrores');
    });

    Livewire.on('ocultarModalBitacora', () => {
        myModal.hide();
    });
</script>
