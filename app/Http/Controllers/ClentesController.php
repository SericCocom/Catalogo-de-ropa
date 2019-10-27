<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class ClentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $cliente = Clientes::all();
        return $cliente;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $empleado=new Clientes;
     $empleado->curp =$request->get('curp');
     $empleado->nombre =$request->get('nombre');
     $empleado->apellidop =$request->get('apellidop');
     $empleado->apellidom =$request->get('apellidom');
     $empleado->direccion =$request->get('direccion');
     $empleado->email =$request->get('correo');
     $empleado->telefono =$request->get('telefono');
     $empleado->contrase =$request->get('password');
     $empleado->usuario =$request->get('usuario');
     $empleado->save();
     return $empleado;

    }

    public function show($id)
    {
        return Clientes::find($id);
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
        Clientes::findOrFail($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
