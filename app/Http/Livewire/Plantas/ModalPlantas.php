<?php

namespace App\Http\Livewire\Plantas;

use App\Models\Planta;
use Livewire\Component;

class ModalPlantas extends Component
{
    public $nombre;
    public $planta;
    protected $listeners = ['resetearErrores', 'mostrarModalActualizarPlanta'];
    protected $rules = [
        'nombre' => 'required:min:3'
    ];

    public function crearPlanta() {
        $this->validate();

        Planta::create([
            'nombre' => $this->nombre
        ]);

        return redirect()->route('plantas.index');
    }

    public function actualizarPlanta() {
        $this->validate();

        $this->planta->update([
            'nombre' => $this->nombre
        ]);

        return redirect()->route('plantas.index');
    }

    public function mostrarModalActualizarPlanta($idPlanta) {
        $this->planta = Planta::find($idPlanta);
        $this->nombre = $this->planta->nombre;
        $this->emit('mostrarModalCrearPlanta');
    }

    public function resetearErrores() {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->nombre = null;
        $this->planta = null;
    }

    public function render()
    {
        return view('livewire.plantas.modal-plantas');
    }
}
