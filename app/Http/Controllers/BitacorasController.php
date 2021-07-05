<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class BitacorasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('bitacora.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mecanicos = User::where('rol_id', 3)->get();
        return View('bitacora.bitacora', [
            'mecanicos' => $mecanicos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Bitacora $bitacora
     * @return \Illuminate\Http\Response
     */
    public function show(Bitacora $bitacora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bitacora $bitacora
     * @return \Illuminate\Http\Response
     */
    public function edit(Bitacora $bitacora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Bitacora $bitacora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bitacora $bitacora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bitacora $bitacora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bitacora $bitacora)
    {
        //
    }
}
