<x-app-layout>
    <x-slot name="header">
        Maquinas
    </x-slot>
    <div class="card p-3 rounded-3 overlay-scrollbar" style="background-color: white!important">
        <div class="d-flex align-content-between align-items-center justify-content-between">
            <p class="text-muted mb-3 fs-4 fw-bold">Maquinas</p>
            <a href="#!" class="btn btn-sm btn-primary">Agregar</a>
        </div>
        <table class="table table-borderless align-middle">

            <thead class="border-top border-bottom">
            <th class="text-uppercase text-muted ">#</th>
            <th class="text-uppercase text-muted ">Modelo</th>
            <th class="text-uppercase text-muted ">Marca</th>
            <th class="text-uppercase text-muted ">Operador</th>
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
                Operador
            </td>
            <td>
                <button class="btn" data-bs-toggle="modal" data-bs-target="#agregarBitacora"><i class="fas fa-edit"></i></button>
                |
                <button class="btn"><i class="fas fa-trash"></i></button>
            </td>
            </tbody>
        </table>
    </div>
</x-app-layout>
