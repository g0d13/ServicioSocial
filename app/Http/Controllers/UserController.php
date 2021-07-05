<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::with('rol')->with('planta')->get();
        return view('usuario.index', ['usuarios' => $usuarios, 'errores' => null, 'idModal' => null] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        User::create($request->all());

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$request->get('password')) {
            $user->update([
                'nombre' => $request->get('nombre'),
                'apellidos' => $request->get('apellidos'),
                'email' => $request->get('email'),
                'email' => $request->get('email'),
                'rol_id' => $request->get('rol_id'),
                'planta_id' => $request->get('planta_id'),
            ]);
        } else {
            $user->update($request->all());
        }


        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();

        return redirect()->route('usuarios.index');
    }
}
