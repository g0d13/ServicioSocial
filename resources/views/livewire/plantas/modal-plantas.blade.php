<div wire:ignore.self class="modal fade" id="modalPlanta" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $planta ? 'Actualizar planta': 'Crear planta' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" wire:model="nombre">
                    @error('nombre')
                        <span class="text-danger fw-bold">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                @if ($planta)
                    <button type="button" class="btn btn-primary" wire:click.prevent="actualizarPlanta">Actualizar</button>
                @else
                    <button type="button" class="btn btn-primary" wire:click.prevent="crearPlanta">Crear</button>
                @endif
            </div>
        </form>
    </div>
</div>

<script>
    var myModal;
    Livewire.on('mostrarModalCrearPlanta', () => {
        myModal = new bootstrap.Modal(document.getElementById('modalPlanta'), {});

        myModal.show();
    });

    document.getElementById('modalPlanta').addEventListener('hidden.bs.modal', function(event) {
        Livewire.emit('resetearErrores');
    });
</script>
