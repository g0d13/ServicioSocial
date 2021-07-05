<x-app-layout>
    <x-slot name="header">
        Bitacoras
    </x-slot>
    <div class="card p-3 rounded-3 overlay-scrollbar" style="background-color: white!important">
        <div class="d-flex align-content-between align-items-center justify-content-between">
            <p class="text-muted mb-3 fs-4 fw-bold">Bitacoras</p>
            <a href="{{ route('bitacoras.create') }}" class="btn btn-sm btn-primary">Agregar</a>
        </div>
        <table class="table-responsive-lg table table-borderless align-middle">
            <thead class="border-top border-bottom">
                <th class="text-uppercase text-muted ">#</th>
                <th class="text-uppercase text-muted ">Nombre</th>
                <th class="text-uppercase text-muted ">Detalles</th>
                <th class="text-uppercase text-muted ">Mecanico encargado</th>
                <th class="text-uppercase text-muted ">Tipos</th>
                <th class="text-uppercase text-muted "></th>
            </thead>
            <tbody>
            <td>
                1
            </td>
            <td>
                Bitacora 1
            </td>
            <td>
                Detalles bitacora 2
            </td>
            <td>
                Mecanico
            </td>
            <td>
                Tipos
            </td>
            <td>
                <button class="btn" data-bs-toggle="modal" data-bs-target="#agregarBitacora"><i class="fas fa-edit"></i></button>
                |
                <button class="btn"><i class="fas fa-trash"></i></button>
            </td>
            </tbody>
        </table>
    </div>
    <div class="row mt-4">
        <!-- Modal -->
        <div class="modal fade" id="agregarBitacora" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar o editar bitacora</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Detalles</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="mecanico" class="form-label">Mecanico encargado</label>
                            <select id="mecanico" class="form-select form-select" aria-label=".form-select-sm example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="tipo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
