<?php

namespace Database\Seeders;

use App\Models\Problema;
use Illuminate\Database\Seeder;

class ProblemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Problema::create(['nombre' => 'Revienta el hilo']);
        Problema::create(['nombre' => 'Salta la puntada']);
        Problema::create(['nombre' => 'Puntada floja']);
        Problema::create(['nombre' => 'Se desensarta la aguja o la bobina']);
        Problema::create(['nombre' => 'No levanta el pie']);
        Problema::create(['nombre' => 'Patina']);
        Problema::create(['nombre' => 'No posesiona']);
        Problema::create(['nombre' => 'No cortan las cuchillas']);
        Problema::create(['nombre' => 'No remacha']);
        Problema::create(['nombre' => 'Fuera de tiempo']);
        Problema::create(['nombre' => 'No frena']);
        Problema::create(['nombre' => 'Falla electronica']);
        Problema::create(['nombre' => 'Pieza rota']);
        Problema::create(['nombre' => 'Falso contacto']);
        Problema::create(['nombre' => 'Motor quemado']);
        Problema::create(['nombre' => 'Falta presion de aire']);
        Problema::create(['nombre' => 'No lubrica']);
        Problema::create(['nombre' => 'Tira aceite']);
        Problema::create(['nombre' => 'Para soldar']);
        Problema::create(['nombre' => 'Reparacion de plancha']);
    }
}
