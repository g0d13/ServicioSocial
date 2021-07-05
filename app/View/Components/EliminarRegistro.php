<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EliminarRegistro extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idModelo;
    public $ruta;
    public function __construct($idModelo, $ruta)
    {
        $this->idModelo = $idModelo;
        $this->ruta = $ruta;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eliminar-registro');
    }
}
