<?php

namespace App\Http\Livewire\Plantas;

use App\Models\Planta;
use Livewire\Component;

class MostrarPlantas extends Component
{
    protected $listeners = ['eliminarPlanta'];

    public function eliminarPlanta($idPlanta) {
        Planta::find($idPlanta)->delete();

        return redirect()->route('plantas.index');
    }

    public function render()
    {
        $plantas = Planta::all();
        return view('livewire.plantas.mostrar-plantas', [
            'plantas' => $plantas
        ]);
    }
}
