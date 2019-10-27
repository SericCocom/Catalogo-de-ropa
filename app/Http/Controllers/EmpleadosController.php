<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $empleado = Empleados::all();
        return $empleado;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $empleado=new Empleados;
     $empleado->curp =$request->get('curp');
     $empleado->nombre =$request->get('nombre');
     $empleado->apellidop =$request->get('apellidop');
     $empleado->apellidom =$request->get('apellidom');
     $empleado->direccion =$request->get('direccion');
     $empleado->correo =$request->get('correo');
     $empleado->telefono =$request->get('telefono');
     $empleado->contrase =$request->get('contrase');
     $empleado->usuario =$request->get('usuario');
     $empleado->save();
     return $empleado;

    }

    public function show($id)
    {
        return Empleados::find($id);
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
        Empleados::findOrFail($id)->update($request->all());
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
