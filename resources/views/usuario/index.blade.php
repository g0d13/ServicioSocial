@php
$usuarioAux = null;
@endphp
<x-app-layout>
    <x-slot name="header">
        Usuarios
    </x-slot>
    @if ($errores)
        <h1>@json($errores)</h1>
    @endif
    <div class="card p-3 rounded-3 overlay-scrollbar" style="background-color: white!important">
        <div class="d-flex align-content-between align-items-center justify-content-between">
            <p class="text-muted mb-3 fs-4 fw-bold">Usuarios</p>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                data-bs-target="#crearUsuario">Agregar</button>
        </div>
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
                        <td>{{ $usuario->planta->nombre }}</td>
                        <td>
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#actualizarUsuario{{ $usuario->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#eliminarRegistro{{ $usuario->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Modal para crear usuario --}}
    <x-usuario-modal :idModal="'crearUsuario'"></x-usuario-modal>

    @foreach ($usuarios as $usr)
        <x-eliminar-registro :idModelo="$usr->id" :ruta="'usuarios.destroy'"></x-eliminar-registro>
        <x-usuario-modal :idModal="'actualizarUsuario'.$usr->id" :idUsuario="$usr->id"></x-usuario-modal>
    @endforeach
</x-app-layout>

<script>
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })

</script>
