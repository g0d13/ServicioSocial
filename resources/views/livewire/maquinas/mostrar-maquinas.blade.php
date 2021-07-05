<x-slot name="header">
    Maquinas
</x-slot>
<div class="card p-3 rounded-3 overlay-scrollbar" style="background-color: white!important">
    <div class="d-flex align-content-between align-items-center justify-content-between">
        <p class="text-muted mb-3 fs-4 fw-bold">Maquinas</p>
        <button wire:click="$emit('mostrarModalCrearMaquina')" class="btn btn-sm btn-primary">Agregar</button>
    </div>
    <div class="table-responsive">
        <table class="table table-borderless align-middle">

            <thead class="border-top border-bottom">
            <th class="text-uppercase text-muted ">#</th>
            <th class="text-uppercase text-muted ">Modelo</th>
            <th class="text-uppercase text-muted ">Marca</th>
            <th class="text-uppercase text-muted ">Operador</th>
            <th class="text-uppercase text-muted "></th>
            </thead>
            <tbody>
            @foreach ($maquinas as $maquina)
                <tr>
                    <td>{{ $maquina->id }}</td>
                    <td>{{ $maquina->modelo }}</td>
                    <td>{{ $maquina->marca }}</td>
                    <td>{{ $maquina->operador }}</td>
                    <td>
                        <button type="button" class="btn" wire:click.prevent="$emit('mostrarModalActualizarMaquina', {{ $maquina }})"><i class="fa fa-edit" aria-hidden="true"></i></button>
                        <button type="button" class="btn" wire:click.prevent="$emit('alertaEliminarMaquina', {{ $maquina }})"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<livewire:maquinas.modal-maquinas/>


<script>
    Livewire.on('alertaEliminarMaquina', id => {
        Swal.fire({
            title: '¿Dese eliminar esta máquina?',
            text: "Est acción no puede revertirse",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarMaquina', id);
            }
        })
    });
</script>
