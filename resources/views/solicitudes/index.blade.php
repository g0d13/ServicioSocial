<x-app-layout>
    <x-slot name="header">
        Solicitudes
    </x-slot>
    <div class="card p-3 rounded-3 overlay-scrollbar" style="background-color: white!important">
        <div class="d-flex align-content-between align-items-center justify-content-between">
            <p class="text-muted mb-3 fs-4 fw-bold">Solicitudes</p>
            <a href="{{ route('solicitudes.create') }}" class="btn btn-sm btn-primary">Agregar</a>
        </div>
        <table class="table table-borderless align-middle">
            <thead class="border-top border-bottom">
                <th class="text-uppercase text-muted ">#</th>
                <th class="text-uppercase text-muted ">Prioridad</th>
                <th class="text-uppercase text-muted ">Problema</th>
                <th class="text-uppercase text-muted ">Modulo</th>
                <th class="text-uppercase text-muted ">Supervisor</th>
                <th class="text-uppercase text-muted ">Status</th>
                <th class="text-uppercase text-muted ">Maquina</th>
                <th class="text-uppercase text-muted ">Bitacora</th>
                <th class="text-uppercase text-muted "></th>
            </thead>
                <tbody>
                <td>
                    1
                </td>
                <td>
                    Alta
                </td>
                <td>
                    Mecanico
                </td>
                <td>
                    Modulo
                </td>
                <td>
                    Juan Diego
                </td>
{{-- No mostrar a los supervisores ni a mecanicos--}}
                <td>
                    Maquina 33
                </td>
                <td>
                    Numero maquina
                </td>
                {{-- No mostrar a los supervisores ni a mecanicos--}}
                <td>
                    Bitacora 1
                </td>
                <td>
                    {{-- Mostrar solo a los supervisores --}}
                    <button class="btn">
                        <i class="far fa-clock"></i>
                    </button>
                    {{-- Mostrar solo a los mecanicos --}}
                    <button class="btn">
                        <i class="fas fa-check"></i>
                    </button>
                </td>
            </tbody>
        </table>
    </div>
</x-app-layout>
