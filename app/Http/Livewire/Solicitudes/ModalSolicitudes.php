<?php

namespace App\Http\Livewire\Solicitudes;

use App\Models\Bitacora;
use App\Models\Maquina;
use App\Models\Problema;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ModalSolicitudes extends Component
{
    public $prioridad;
    public $problema;
    public $modulo;
    public $maquina;
    public $solicitud;
    public $bitacora;
    public $operacion;
    protected $listeners = ['resetearErrores', 'mostrarModalSolicitud'];

    protected $rules = [
        'prioridad' => 'required|numeric|between:1,10',
        'problema' => 'required|numeric',
        'operacion' => 'required',
        'modulo' => 'required',
        'maquina' => 'required',
    ];

    public function crearSolicitud() {
        $this->validate();

        Solicitud::create([
            'prioridad' => $this->prioridad,
            'operacion' => $this->operacion,
            'supervisor_id' => Auth::user()->id,
            'modulo' => $this->modulo,
            'problema_id' => $this->problema,
            'bitacora_id' => $this->bitacora,
            'maquina_id' => $this->maquina
        ]);

        return redirect()->route('bitacoras.index');
    }

    public function mostrarModalSolicitud($idBitacora) {
        $this->bitacora = $idBitacora;
        $this->emit('mostrarModalCrearSolicitud');
    }

    public function resetearErrores() {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->prioridad = null;
        $this->problema = null;
        $this->modulo = null;
        $this->maquina = null;
        $this->bitacora = null;
        $this->solicitud = null;
        $this->operacion = null;

        // $this->emit('ocultarModalBitacora');
    }

    public function render()
    {
        $problemas = Problema::all();
        $maquinas = Maquina::all();
        $bitacoras = Bitacora::all();
        return view('livewire.solicitudes.modal-solicitudes', [
            'problemas' => $problemas,
            'maquinas' => $maquinas,
            'bitacoras' => $bitacoras
        ]);
    }
}
