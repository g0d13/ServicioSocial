<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(['nombre' => 'Administrador']);
        Rol::create(['nombre' => 'Supervisor']);
        Rol::create(['nombre' => 'Mecanico']);
    }
}
