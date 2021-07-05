<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\User;
use Livewire\Component;

class MostrarUsuarios extends Component
{
    public $usuario = null;
    protected $listeners = ['eliminarUsuario'];

    public function eliminarUsuario($id) {
        $usuario = User::find($id);
        $usuario->delete();

        return redirect()->route('usuarios.index');
    }

    public function render()
    {
        $usuarios = User::all();
        return view('livewire.usuarios.mostrar-usuarios', [
            'usuarios' => $usuarios
        ]);
    }
}
