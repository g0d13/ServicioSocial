<?php

namespace App\Http\Livewire\Maquinas;

use App\Models\Maquina;
use Livewire\Component;

class MostrarMaquinas extends Component
{
    public function render()
    {
        $maquinas = Maquina::all();
        return view('livewire.maquinas.mostrar-maquinas', [
            'maquinas' => $maquinas
        ]);
    }
}
