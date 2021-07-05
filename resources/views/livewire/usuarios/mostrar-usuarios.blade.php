<x-slot name="header">
    Usuarios
</x-slot>
<div class="card p-3 rounded-3 overlay-scrollbar" style="background-color: white!important">
    <div class="d-flex align-content-between align-items-center justify-content-between">
        <p class="text-muted mb-3 fs-4 fw-bold">Usuarios</p>
        <button class="btn btn-sm btn-primary" wire:click="$emit('mostrarModalCrearUsuario')">Agregar</button>
    </div>
    <div class="table-responsive">

        <table class="table table-borderless align-middle">
            <thead class="border-top border-bottom">
            <th class="text-uppercase text-muted ">#</th>
            <th class="text-uppercase text-muted ">Nombre</th>
            <th class="text-uppercase text-muted ">Apellidos</th>
            <th class="text-uppercase text-muted ">Correo</th>
            <th class="text-uppercase text-muted ">rol</th>
            <th class="text-uppercase text-muted ">planta</th>
            <th class="text-uppercase text-muted ">Acciones</th>
            </thead>
            <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->apellidos }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol->nombre }}</td>
                    <td>Planta {{ $usuario->planta->id ?? ''}}</td>
                    <td>
                        <button class="btn" wire:click="$emit('mostrarModalActualizarUsuario', {{ $usuario->id }})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn"
                                wire:click.prevent="$emit('alertaEliminarUsuario', {{ $usuario->id }})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<livewire:usuarios.modal-usuario />

<script>
    Livewire.on('alertaEliminarUsuario', id => {
        Swal.fire({
            title: '¿Dese eliminar este usuario?',
            text: "Est acción no puede revertirse",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarUsuario', id);
            }
        })
    });
</script>
