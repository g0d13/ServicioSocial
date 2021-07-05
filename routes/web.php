<?php

use App\Exports\BitacoraExport;
use App\Http\Controllers\BitacorasController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Bitacoras\MostrarBitacoras;
use App\Http\Livewire\Maquinas\MostrarMaquinas;
use App\Http\Livewire\Plantas\MostrarPlantas;
use App\Http\Livewire\Reparaciones\MostrarReparaciones;
use App\Http\Livewire\Solicitudes\MostrarSolicitudes;
use App\Http\Livewire\Usuarios\Index;
use App\Http\Livewire\Usuarios\MostrarUsuarios;
use App\Models\Bitacora;
use App\Models\Solicitud;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;


use Maatwebsite\Excel\Facades\Excel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('auth');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->name('dashboard')->middleware('auth');

// Route::get('/bitacoras', function () {
//     return view('bitacoras');
// })->name('bitacoras');

// ruta de bitacoras
Route::get('/bitacoras', MostrarBitacoras::class)->name('bitacoras.index')->middleware('auth')->middleware('role:1;2');

//  rutas de usuarios
Route::get('/usuarios', MostrarUsuarios::class)->name('usuarios.index')->middleware('auth')->middleware('role:1');

// rutas de solicitudes
Route::get('/solicitudes', MostrarSolicitudes::class)->name('solicitudes.index')->middleware('auth');


Route::get('/reparaciones', MostrarReparaciones::class)->name('reparaciones.index')->middleware('auth')->middleware('role:1');

Route::get('/maquinas', MostrarMaquinas::class)->name('maquinas.index')->middleware('auth')->middleware('role:1');

Route::get('/plantas', MostrarPlantas::class)->name('plantas.index')->middleware('auth')->middleware('role:1');

Route::get('/configuracion', function () {
    return view('configuracion');
})->name('configuracion')->middleware('auth')->middleware('role:1');

Route::get('/test', function () {
    return \App\Models\Bitacora::whereDoesntHave('solicitudes.reparacion', function (Builder $query) {
            return $query->whereNotNull('quedo_lista');
        })->get();
});

Route::get('/reporte/{tipo}/{plantaId}', function ($tipo, $plantaId) {
    switch ($tipo) {
        case 'diario':
            return Excel::download(new BitacoraExport('D', $plantaId), 'reporte '.Carbon::now()->format('d-m-Y').'.xls');
        case 'semanal':
            $fecha = Carbon::now()->subDays(Carbon::now()->dayOfWeek)->format('d-m-y'). ' '.Carbon::now()->subDays(Carbon::now()->dayOfWeek)->addDays(6)->format('d-m-y');
            return Excel::download(new BitacoraExport('S', $plantaId), 'reporte '.$fecha.'.xls');
        case 'mensual':
            return Excel::download(new BitacoraExport('M', $plantaId), 'reporte'.Carbon::now()->monthName.'.xls');
    }
})->name('reporte');

require __DIR__ . '/auth.php';
