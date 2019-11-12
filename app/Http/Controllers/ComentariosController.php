<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentarios;
use Session;
use DB; 
use App\Albums;
 
class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //se cargar los pedidos a mostrar con vue
       $pedidos=DB::select("SELECT CONCAT(clientes.nombre,' ',clientes.apellidop,' ',clientes.apellidom) as nombre,productos.photo as photo,productos.precioventa as precio,comentarios.preparado as preparado,comentarios.entregado as entregado,comentarios.created_at as fecha,comentarios.cla as clave,comentarios.id_usuario as cliente,comentarios.prenda as prenda,clientes.direccion as direccion FROM comentarios INNER JOIN clientes ON clientes.curp=comentarios.id_usuario INNER JOIN productos ON productos.clave=comentarios.prenda WHERE comentarios.cancelado='NO' AND comentarios.entregado='NO' ORDER BY comentarios.created_at");
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
        //desde la parte front se hace un post y se obtienen los datos
     $comentario=new Comentarios;
     $comentario->id_usuario=Session::get('curp');
     $comentario->prenda=$request->get('clave');
        $clave=$request->get('clave');
        $cr=Session::get('curp');
        //se verifica si el cliente ya ha encargado antes la prenda seleccionada
        $DB=DB::table('comentarios')->select('id_usuario')
    ->where('id_usuario',$cr)
    ->where('prenda',$clave)
    ->first();
    //valida que el cliente no encargue una prenda dos veces
        if (empty($DB)) {
            //valida si la prenda fue encargada antes
            $pren=DB::table('comentarios')->select('id_usuario')
             ->where('prenda',$clave)
             ->first();
            if (!empty($pren)) {
                $comentario->save();
                //se le avisa que la prenda ya ha sido encargada por otro cliente
                // pero aun asi se guarda su pedido
                return 'Esta prenda fue encargada antes por un cliente, se guardará su pedido en caso de cancelacion'; 
            }else{
                $comentario->save();
            return 'Guardado con éxito'; 
            }

           
        }else{
            //Se le informa que ya ha encargado esta prenda antes
            return 'Usted ya encargó esta prenda anteriormente';
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
        $albums= DB::select("SELECT * FROM albums WHERE publicado='SI'");
        $pedidos=DB::select("SELECT productos.precioventa  AS precio,Comentarios.created_at AS 'fecha',
            CONCAT(clientes.nombre,' ',clientes.apellidop,' ',clientes.apellidom) as 'nombre', comentarios.entregado AS 'entregado',
                productos.clave as 'clave',comentarios.preparado as preparado
            FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda INNER JOIN clientes ON clientes.curp=comentarios.id_usuario INNER JOIN albums ON albums.id_album=productos.id_album WHERE albums.publicado='SI' AND comentarios.cancelado='NO' ORDER BY comentarios.created_at ASC");
        return view('admin.views.resumen')->with('pedidos',$pedidos)->with('albums',$albums);
    }
    public function cancelar(Request $request){
        $datos=DB::table('comentarios')
                ->where('cla', $request->get('codigo'))
                ->where('preparado','SI');
                if (empty($datos)) {
                    DB::table('comentarios')
                ->where('cla', $request->get('codigo'))
                ->update(['cancelado' => 'SI']);
                return 'Su pedido ha sido cancelado';
                }else{
                    return 'Su pedido ya fue preparado y ya no se puede cancelar';
                }

          
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
                $curp=$request->get('cli');
                $prenda=$request->get('pren');
                //verifica si algun otro cliente pidió la misma prenda
                $pedidosextra=DB::select("SELECT comentarios.cla as cla, comentarios.id_usuario,comentarios.prenda FROM comentarios WHERE prenda='$prenda' AND id_usuario!='$curp' ");
                //si hay pedidos adicionales las cancela
                if (!empty($pedidosextra)) {
                   for ($i=0; $i < sizeof($pedidosextra) ; $i++) {
                   //cancelación de pedidos extra 
                       DB::table('comentarios')
                ->where('cla', $pedidosextra[$i]->cla)
                ->update(['cancelado' => 'SI']);
                   }
                }
                //Marca el pedido del cliente actual como entregado y desaparece de la vista traida de vue
                 DB::table('comentarios')
                ->where('cla', $request->get('codigo'))
                ->update(['entregado' => 'SI']);
        return 'El pedido ha sido entregado, si hay pedidos de la misma prenda fueron cancelados';
    }
  

}
