<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(ProblemaSeeder::class);
        \App\Models\Planta::factory(4)->create();
        \App\Models\User::create([
            'nombre' => "Admin",
            'apellidos' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'rol_id' => 1
        ]);
         \App\Models\Maquina::factory(150)->create();
    }
}
