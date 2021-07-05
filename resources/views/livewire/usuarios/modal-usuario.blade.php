<div wire:ignore.self class="modal  " id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div wire:ignore.self class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $titulo }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" wire:model="nombre">
                            @error('nombre')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" wire:model="apellidos">
                            @error('apellidos')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" wire:model="correo">
                            @error('correo')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" wire:model="contrasenia">
                            @error('contrasenia')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Rol</label>
                            <select wire:model="rol" class="form-control">
                                <option value="">--Seleccione un rol--</option>
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                @endforeach
                            </select>
                            @error('rol')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Planta</label>
                            <select wire:model="planta" class="form-control">
                                <option value="">--Seleccione una planta--</option>
                                @foreach ($plantas as $planta)
                                    <option value="{{ $planta->id }}">Planta {{ $planta->id }}</option>
                                @endforeach
                            </select>
                            @error('planta')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            wire:click.prevent="$emit('resetearErrores')">Cerrar</button>
                        @if ($usuario)
                            <button type="button" wire:click.prevent="actualizarUsuario" class="btn btn-primary">Actualizar</button>
                        @else
                            <button type="button" wire:click.prevent="crearUsuario" class="btn btn-primary">Crear</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var myModal;
    Livewire.on('mostrarModalCrearUsuario', () => {
        myModal = new bootstrap.Modal(document.getElementById('modalUsuario'), {});

        myModal.show();
    });

    document.getElementById('modalUsuario').addEventListener('hidden.bs.modal', function(event) {
        Livewire.emit('resetearErrores');
    });

    Livewire.on('ocultarModalUsuario', () => {
        myModal.hide();
    });
</script>
