<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Planta;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $plantas = Planta::all();
        return view('dashboard', [
            'plantas' => $plantas
        ]);
    }
}
