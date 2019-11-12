<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $productos = Productos::all()->where('vendido','NO');
        return $productos;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $productos=new Productos;

     $photo=$request->file('photo');

     if ($photo!=null) {
         $longitud=9;
          $nombre ='';
          $pattern = '1234567890';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $nombre .= $pattern{mt_rand(0,$max)};

            //$nombre = $file->getClientOriginalName();
            $photo->move(public_path().'/img/',$nombre);
            $productos->photo=$nombre;
        }

     $productos->clave =$request->get('clave');
     $productos->talla =$request->get('talla');
     $productos->precioventa =$request->get('precioventa');
     $productos->preciocompra =$request->get('preciocompra');
     $productos->id_album =$request->get('id_album');
     $productos->categoria =$request->get('categoria');
     $productos->descripcion =$request->get('descripcion');
     $productos->save();
     return $productos;

    }

    public function show($id)
    {
        return Productos::find($id);
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
        Productos::findOrFail($id)->update($request->all());
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
