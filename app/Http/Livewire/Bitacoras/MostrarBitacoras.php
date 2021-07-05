<?php

namespace App\Http\Livewire\Bitacoras;

use App\Models\Bitacora;
use App\Models\Reparacion;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MostrarBitacoras extends Component
{
    protected $listeners = ['eliminarBitacora'];

    public function eliminarBitacora($id) {
        $bitacora = Bitacora::find($id);
        $bitacora->delete();

        return redirect()->route('bitacoras.index');
    }

    public function render()
    {
        $usuario = Auth::user();
        $bitacoras = Bitacora::with('solicitudes')->when($usuario->rol_id !== 1, function ($query) use($usuario){
            $query->where('planta_id', $usuario->planta_id);
        })->get();

        // dd($bitacoras);

        $bitacorasAux = [];

        foreach ($bitacoras as $i => $bitacora) {
            $bitacoras[$i]->haySolicitudes = $bitacora->solicitudes ? sizeof($bitacora->solicitudes) : 0;

            if ($bitacora->solicitudes) {
                $solicitudes = Solicitud::with('reparacion')->where('bitacora_id', $bitacora->id)->get();
                $llegoMecanico = sizeof($solicitudes) > 0 ? true : false;

                foreach ($solicitudes as $solicitud) {
                    if ($solicitud->reparacion) {
                        $bitacoras[$i]->haySolicitudesAtendidas = $bitacoras[$i]->haySolicitudesAtendidas ? $bitacoras[$i]->haySolicitudesAtendidas + 1: 1;
                    }

                    if (!$solicitud->llegada_mecanico) {
                        $llegoMecanico = false;
                    }
                }

                // $bitacoras[$i]->llegoMecanico = $bitacoras[$i]->llegoMecanico ? $bitacoras[$i]->llegoMecanico : $llegoMecanico;
                $bitacoras[$i]->llegoMecanico = $llegoMecanico;
            }



            $bitacorasAux = $bitacoras;
        }
        // dd($bitacorasAux);
        // $bitacoras = collect($bitacorasAux);
        // dd($bitacorasAux[0]->solicitudes);

        return view('livewire.bitacoras.mostrar-bitacoras', [
            'bitacoras' => $bitacorasAux
        ]);
    }
}
