<x-slot name="header">
    Plantas
</x-slot>
<div class="card p-3 rounded-3 overlay-scrollbar" style="background-color: white!important">
    <div class="d-flex align-content-between align-items-center justify-content-between">
        <p class="text-muted mb-3 fs-4 fw-bold">Plantas</p>
        <button wire:click="$emit('mostrarModalCrearPlanta')" class="btn btn-sm btn-primary">Agregar</button>
    </div>
    <div class="table-responsive">
        <table class="table table-borderless align-middle">

            <thead class="border-top border-bottom">
            <th class="text-uppercase text-muted ">#</th>
            <th class="text-uppercase text-muted ">Nombre</th>
            <th class="text-uppercase text-muted ">Fecha creacion</th>
            <th class="text-uppercase text-muted "></th>
            </thead>
            <tbody>
            @foreach ($plantas as $planta)
                <tr>
                    <td>{{ $planta->id }}</td>
                    <td>Sin mecanico encargado</td>
                    <td>{{ \Carbon\Carbon::parse($planta->created_at)->day }} de {{ \Carbon\Carbon::parse($planta->created_at)->monthName }} de {{ \Carbon\Carbon::parse($planta->created_at)->year }}</td>
                    <td>
                        <button class="btn" wire:click.prevent="$emit('mostrarModalActualizarPlanta', {{ $planta->id }})">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<livewire:plantas.modal-plantas>
