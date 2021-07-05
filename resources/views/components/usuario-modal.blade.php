<div class="row mt-4">
    <!-- Modal -->
    <div class="modal fade" id="{{ $idModal }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ $idUsuario == 0 ? 'Crear nuevo usuario' : 'Actualizar usuario' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ $idUsuario == 0 ? route('usuarios.store') : route('usuarios.update', ['id' => $idUsuario]) }}"
                    method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="{{ $usuario->nombre ?? '' }}"
                                required>
                            <div class="invalid-feedback">
                                El nombre es requerido
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" value="{{ $usuario->apellidos ?? '' }}"
                                name="apellidos" required>
                            <div class="invalid-feedback">
                                Los apellidos son requerido
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" value="{{ $usuario->email ?? '' }}" required
                                name="email">
                            <div class="invalid-feedback">
                                El correo es requerido
                            </div>
                        </div>
                        @if ($usuario)
                            <div class="mb-3">
                                <label for="correo" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" minlength="8">
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="correo" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" value="{{ $usuario->password ?? '' }}"
                                    required name="password" minlength="8">
                                <div class="invalid-feedback">
                                    La contraseña es requerida y debe ser de al menos 8 caracteres
                                </div>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Planta</label>
                            <select class="form-select form-select" aria-label=".form-select-sm example"
                                name="planta_id" required>
                                @if (!$usuario)
                                    <option value="" {{ $idUsuario == 0 ? 'selected' : '' }}>--Selecciona la planta--
                                    </option>
                                @endif
                                @foreach ($plantas as $planta)
                                    @if ($usuario)
                                        <option value="{{ $planta->id }}"
                                            {{ $usuario->planta->id == $planta->id ? 'selected' : '' }}>
                                            {{ $planta->nombre }}</option>
                                    @else
                                        <option value="{{ $planta->id }}">{{ $planta->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                La planta es obligatoria
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol</label>
                            <select id="rol" class="form-select form-select" aria-label=".form-select-sm example"
                                name="rol_id" required>
                                @if (!$usuario)
                                    <option value="">--Selecciona el rol--</option>
                                @endif
                                @foreach ($roles as $rol)
                                    @if ($usuario)
                                        <option value="{{ $rol->id }}"
                                            {{ $usuario->rol->id == $rol->id ? 'selected' : '' }}>
                                            {{ $rol->nombre }}</option>
                                    @else
                                        <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                El rol es requerido
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
