<?php

namespace App\Http\Livewire\Reparaciones;

use App\Models\Reparacion;
use Carbon\Carbon;
use Livewire\Component;

class ModalReparaciones extends Component
{
    public $tipoReparacion;
    public $bitacoraId;
    public $solicitudId;
    public $quedoLista;

    protected $listeners = ['resetearErrores', 'mostrarModalSolicitud'];

    protected $rules = [
        'tipoReparacion' => 'required|string',
    ];

    public function mostrarModalSolicitud($solicitudId, $bitacoraId)
    {
        $this->bitacoraId = $bitacoraId;
        $this->solicitudId = $solicitudId;
        $this->emit('mostrarModalCrearReparacion');
    }

    public function crearReparacion()
    {
        $this->validate();

        Reparacion::create([
            'tipo_reparacion' => $this->tipoReparacion,
            'quedo_lista' => Carbon::now(),
            'bitacora_id' => $this->bitacoraId,
            'solicitud_id' => $this->solicitudId,
            'mecanico_id' => \Auth::user()->id
        ]);

        return redirect()->route('solicitudes.index');
    }

    public function render()
    {
        return view('livewire.reparaciones.modal-reparaciones');
    }
}
