<?php

namespace App\Http\Livewire\Maquinas;

use App\Models\Maquina;
use Livewire\Component;

class ModalMaquinas extends Component
{
    public $idMaquina;
    public $modelo;
    public $marca;
    public $operador;
    public $maquina;

    protected $listeners = ['resetearErrores', 'mostrarModalActualizarMaquina', 'eliminarMaquina'];
    protected $rules = [
        'idMaquina' => 'required|unique:maquinas,id',
        'modelo' => 'required',
        'marca' => 'required',
        'operador' => 'required'
    ];

    public function crearMaquina() {
        $this->validate();

        Maquina::create([
            'id' => $this->idMaquina,
            'modelo' => $this->modelo,
            'marca' => $this->marca,
            'operador' => $this->operador
        ]);

        return redirect()->route('maquinas.index');
    }

    public function actualizarMaquina() {
        $this->validate([
            'modelo' => 'required',
            'marca' => 'required',
            'operador' => 'required'
        ], null, [
            'modelo' => $this->modelo,
            'marca' => $this->marca,
            'operador' => $this->operador
        ]);

        $this->maquina->update(
            [
                'modelo' => $this->modelo,
                'marca' => $this->marca,
                'operador' => $this->operador
            ]
        );

        return redirect()->route('maquinas.index');
    }

    public function eliminarMaquina($maquina) {
        Maquina::find($maquina['id'])->delete();

        return redirect()->route('maquinas.index');
    }

    public function mostrarModalActualizarMaquina($maquina) {
        $this->maquina = Maquina::find($maquina['id']);
        $this->idMaquina = $this->maquina->id;
        $this->marca = $this->maquina->marca;
        $this->modelo = $this->maquina->modelo;
        $this->operador = $this->maquina->operador;

        $this->emit('mostrarModalCrearMaquina');
    }


    public function resetearErrores() {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->idMaquina = null;
        $this->modelo = null;
        $this->marca = null;
        $this->operador = null;
    }

    public function render()
    {
        return view('livewire.maquinas.modal-maquinas');
    }
}
