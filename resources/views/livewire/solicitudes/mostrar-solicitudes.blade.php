<div>
    <x-slot name="header">
        Solicitudes
    </x-slot>
    <div class="card p-3 rounded-3 overlay-scrollbar" style="background-color: white!important">
        <div class="d-flex align-content-between align-items-center justify-content-between">
            <p class="text-muted mb-3 fs-4 fw-bold">Solicitudes</p>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless align-middle">
                <thead class="border-top border-bottom">
                <th class="text-uppercase text-muted ">#</th>
                <th class="text-uppercase text-muted ">Prioridad</th>
                <th class="text-uppercase text-muted ">Problema</th>
                <th class="text-uppercase text-muted ">Modulo</th>
                <th class="text-uppercase text-muted ">Supervisor</th>
                <th class="text-uppercase text-muted ">Maquina</th>
                <th class="text-uppercase text-muted ">Bitacora</th>
                <th class="text-uppercase text-muted "></th>
                </thead>
                <tbody>
                @foreach ($solicitudes as $solicitud)
                    <tr>
                        <td>{{ $solicitud->id }}</td>
                        <td>{{ $solicitud->prioridad }}</td>
                        <td>{{ $solicitud->problema->nombre }}</td>
                        <td>{{ $solicitud->modulo }}</td>
                        <td>{{ $solicitud->supervisor->nombre }} {{ $solicitud->supervisor->apellidos }}</td>
                        <td>Máquina {{ $solicitud->maquina->id }}</td>
                        <td>{{ $solicitud->bitacora->nombre }}</td>
                        <td>
                            @if(auth()->user()->rol_id == 2 && !$solicitud->llegada_mecanico)
                                <button class="btn" id="btnHoraLlegadaMecanico" data-solicitud="{{ $solicitud->id }}">
                                    <i class="far fa-clock"></i>
                                </button>
                            @endif
                            @if (auth()->user()->rol_id == 3 && !$solicitud->reparacion)
                                <button class="btn" id="btnCrearReparacion" data-solicitud="{{ $solicitud->id }}" data-bitacora="{{$solicitud->bitacora->id}}">
                                    <i class="fas fa-plus"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        if (document.getElementById('btnHoraLlegadaMecanico')) {
            document.getElementById('btnHoraLlegadaMecanico').onclick = () => {
                Swal.fire({
                    title: '¿El mecánico ha llegado ya?',
                    text: "Presione aceptar si el mecánico ya ha llegado",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#5cb85c',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('horaLLegadaMecanico', document.getElementById('btnHoraLlegadaMecanico').getAttribute('data-solicitud'));
                    }
                })
            }
        }

        if (document.getElementById('btnCrearReparacion')) {
            document.getElementById('btnCrearReparacion').onclick = () => {
                Livewire.emit('mostrarModalSolicitud', document.getElementById('btnCrearReparacion').getAttribute('data-solicitud'), document.getElementById('btnCrearReparacion').getAttribute('data-bitacora'))
            }
        }


    </script>
    <livewire:reparaciones.modal-reparaciones />
</div>
