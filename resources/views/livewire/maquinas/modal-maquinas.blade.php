<div wire:ignore.self class="modal fade" id="modalMaquina" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $maquina ? 'Actualizar máquina': 'Crear nueva máquina' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Id</label>
                    <input type="text" class="form-control" wire:model="idMaquina" {{ $maquina ? 'disabled': '' }}>
                    @error('idMaquina')
                        <span class="text-danger fw-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Modelo</label>
                    <input type="text" class="form-control" wire:model="modelo">
                    @error('modelo')
                        <span class="text-danger fw-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Marca</label>
                    <input type="text" class="form-control" wire:model="marca">
                    @error('marca')
                        <span class="text-danger fw-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Operador</label>
                    <input type="text" class="form-control" wire:model="operador">
                    @error('operador')
                        <span class="text-danger fw-bold">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                @if ($maquina)
                    <button type="button" class="btn btn-primary" wire:click.prevent="actualizarMaquina">Actualizar</button>
                @else
                    <button type="button" class="btn btn-primary" wire:click.prevent="crearMaquina">Crear</button>
                @endif
            </div>
        </form>
    </div>
</div>

<script>
    var myModal;
    Livewire.on('mostrarModalCrearMaquina', () => {
        myModal = new bootstrap.Modal(document.getElementById('modalMaquina'), {});

        myModal.show();
    });

    document.getElementById('modalMaquina').addEventListener('hidden.bs.modal', function(event) {
        Livewire.emit('resetearErrores');
    });
</script>
