<?php

namespace App\Http\Livewire\Reparaciones;

use App\Models\Reparacion;
use Livewire\Component;

class MostrarReparaciones extends Component
{
    public function render()
    {
        $reparaciones = Reparacion::with('mecanico')->with('bitacora')->get();
        return view('livewire.reparaciones.mostrar-reparaciones', [
            'reparaciones' => $reparaciones
        ]);
    }
}
