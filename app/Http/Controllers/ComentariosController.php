<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentarios;
use Session;
use DB; 
 
class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $pedidos=DB::select("SELECT CONCAT(clientes.nombre,' ',clientes.apellidop,' ',clientes.apellidom) as nombre,productos.photo as photo,productos.precioventa as precio,comentarios.preparado as preparado,comentarios.entregado as entregado,comentarios.created_at as fecha,comentarios.cla as clave FROM comentarios INNER JOIN clientes ON clientes.curp=comentarios.id_usuario INNER JOIN productos ON productos.clave=comentarios.prenda WHERE comentarios.cancelado='NO' AND comentarios.entregado='NO'");
       return $pedidos;
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
        $clave=$request->get('clave');
        $cr=Session::get('curp');
        $DB=DB::table('comentarios')->select('id_usuario')
    ->where('id_usuario',$cr)
    ->where('prenda',$clave)
    ->first();
        if (empty($DB)) {
           $comentario->save();
            return 'Guardado con éxito'; 
        }else{
            return 'Usted ya encargó esta prenda';
        }



     
    

    }

    public function show($id)
    {
        return DB::select("SELECT productos.precioventa  AS precio,productos.photo as photo,comentarios.created_at AS 'fecha',
CONCAT(clientes.nombre,' ',clientes.apellidop,' ',clientes.apellidom) as 'nombre', comentarios.entregado AS 'entregado',
productos.clave as 'clave'
FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda INNER JOIN clientes ON clientes.curp=comentarios.id_usuario");
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
    public function DataTable(){
        $pedidos=DB::select("SELECT productos.precioventa  AS precio,Comentarios.created_at AS 'fecha',
            CONCAT(clientes.nombre,' ',clientes.apellidop,' ',clientes.apellidom) as 'nombre', comentarios.entregado AS 'entregado',
                productos.clave as 'clave',comentarios.preparado as preparado
            FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda INNER JOIN clientes ON clientes.curp=comentarios.id_usuario INNER JOIN albums ON albums.id_album=productos.id_album WHERE albums.publicado='SI' ORDER BY comentarios.created_at ASC");
        return view('admin.views.resumen')->with('pedidos',$pedidos);
    }
    public function cancelar(Request $request){

          DB::table('comentarios')
                ->where('cla', $request->get('codigo'))
                ->update(['cancelado' => 'SI']);
        return 'Su pedido ha sido cancelado';
    }
    public function preparar(Request $request){

          DB::table('comentarios')
                ->where('cla', $request->get('codigo'))
                ->update(['preparado' => 'SI']);
        return 'El pedido ha sido preparado';
    }
    public function despreparar(Request $request){

          DB::table('comentarios')
                ->where('cla', $request->get('codigo'))
                ->update(['preparado' => 'NO']);
        return 'El pedido no ha sido preparado';
    }
    public function entregar(Request $request){

          DB::table('comentarios')
                ->where('cla', $request->get('codigo'))
                ->update(['entregado' => 'SI']);
        return 'El pedido ha sido entregado';
    }
  

}
