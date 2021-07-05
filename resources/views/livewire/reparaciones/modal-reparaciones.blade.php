<div wire:ignore.self class="modal fade" id="modalReparacion" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear nueva reparacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de reparacion</label>
                    <input id="tipo"  name="tipo" class="form-control" wire:model="tipoReparacion">
                    @error('tipo')
                        <span class="text-danger fw-bold">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="crearReparacion">Crear</button>
            </div>
        </form>
    </div>
</div>

<script>
    var myModal;
    Livewire.on('mostrarModalCrearReparacion', () => {
        myModal = new bootstrap.Modal(document.getElementById('modalReparacion'), {});
        myModal.show();
    });

    document.getElementById('modalSolicitud').addEventListener('hidden.bs.modal', function(event) {
        Livewire.emit('resetearErrores');
    });

    Livewire.on('ocultarModalReparacion', () => {
        myModal.hide();
    });
</script>
