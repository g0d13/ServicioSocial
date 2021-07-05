<?php

namespace App\View\Components;

use App\Models\Planta;
use App\Models\Rol;
use App\Models\User;
use Illuminate\View\Component;

class UsuarioModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $idUsuario;
    public $idModal;
    public function __construct($idModal, $idUsuario=0)
    {
        $this->idModal = $idModal;
        $this->idUsuario = $idUsuario;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $roles = Rol::all();
        $plantas = Planta::all();
        $usuario = null;
        if ($this->idUsuario > 0) {
            $usuario = User::find($this->idUsuario);
        }
        return view('components.usuario-modal', ['roles' => $roles, 'usuario' => $usuario, 'plantas' => $plantas]);
    }
}
