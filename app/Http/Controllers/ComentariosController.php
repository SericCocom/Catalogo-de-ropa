<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentarios;
use Session;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $comentario =  Comentarios::all();
       return $comentario;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $comentario=new Comentarios;
     $comentario->id_usuario=Session::get('curp');
     $comentario->prenda=$request->get('clave');
     $comentario->save();
     return $comentario;

    }

    public function show($id)
    {
        $id=Session::get('curp');
        return Comentarios::all()->where('id_usuario',$id);
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
