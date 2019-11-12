<?php

namespace App\Http\Controllers\Auth;
use App\productos;
use Auth;
use DB;
use Session;
use Cache;
use Cookie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{   //login: permite el logueo del empleado para interactuar conla parte administrativa
    public function login(Request $request){
      //se valida que los campos no esten vacíos
     $credentials=   $this->validate(request(),[
            'usuario'=>'required|string',
            'password'=>'required|string'

        ]);
     

    $usuario=$request->get('usuario');
    $password=$request->get('password');
    //se revisa que el usuario sea correcto
    $datos=DB::table('users')->select('usuario')
    ->where('usuario',$usuario)
    ->first();
    
    
       if (!empty($datos)){
          //se revisa que la contraseña sea correcta
            $datos2=DB::table('users')->select('contrase')
            ->where('contrase',$password)
            ->first();

             if (!empty($datos2)) {
                 $empleado=DB::table('users')->select('contrase','nombre','apellidop','apellidom','curp','rol')
            ->where('usuario',$usuario)
            ->where('contrase',$password)
            ->get();
            Session::put('curp',$empleado[0]->curp);
            Session::put('nombre',$empleado[0]->nombre);
            Session::put('apellidop',$empleado[0]->apellidop);
            Session::put('apellidom',$empleado[0]->apellidom);
            Session::put('rol',$empleado[0]->rol);
                //se decuelve la vista principal con la sesion ya iniciada
                return view('admin.layouts.contenedor');
                }
            else{
              //se decuelve la vista login con el mensaje de la contraseña erronea
              return back()->withErrors(['password'=>'Contraseña incorrecta'])
              ->withInput(request(['usuario','password']));
              }      
      }
      else{
        //se decuelve la vista login con el mensaje de usuario incorrecto
        return back()->withErrors(['usuario'=>'Este usuario no existe o no se encuentra registrado'])
        ->withInput(request(['password','usuario']));
      }
     

     
    }
      //loginCli: permite el logueo del cliente
    public function loginCli(Request $request){
        //se valida que los campos no esten vacios 
     $credentials=   $this->validate(request(),[
            'usuario'=>'required|string',
            'password'=>'required|string'

        ]); 
    $usuario=$request->get('usuario');
    $password=$request->get('password');
    //se cargan todos las prendas en las que el album esten publicadas
    $Prod=DB::select("SELECT * FROM productos INNER JOIN albums ON albums.id_album=productos.id_album WHERE albums.publicado='SI' AND albums.cancelado='NO'");
    //se verifica que el cliente a ingresar esté autorizado
      $autorizado=DB::table('clientes')->select('usuario')
    ->where('usuario',$usuario)
    ->where('password',$password)
    ->where('autorizado','SI')
    ->first();
      if (!empty($autorizado)) {
        

        //por separado se valida que el cliente haya ingresado su usuario de forma correcta
    $datos=DB::table('clientes')->select('usuario')
    ->where('usuario',$usuario)
    ->first();
    
    
       if (!empty($datos)){
        //por separado se valida que el cliente haya ingresado su contraseña de forma correcta
            $datos2=DB::table('clientes')->select('password')
            ->where('password',$password)
            ->first();

             if (!empty($datos2)) {
                 $cliente=DB::table('clientes')->select('password','nombre','apellidop','apellidom','curp')
            ->where('usuario',$usuario)
            ->where('password',$password)
            ->get();
            $cr=$cliente[0]->curp;
            Session::put('curp',$cliente[0]->curp);
            Session::put('nombre',$cliente[0]->nombre);
            Session::put('apellidop',$cliente[0]->apellidop);
            Session::put('apellidom',$cliente[0]->apellidom);
            //se cargan los pedidos de cliente para enviarlos al index
            $pedidos=DB::select("SELECT productos.precioventa  as precio,productos.descripcion as des,productos.photo,albums.album as album  FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda INNER JOIN albums on productos.id_album=albums.id_album WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");
             //se calcula la cuenta total del cliente para enviarlos al index
            $total=DB::select("SELECT SUM(productos.precioventa) as 'total' FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");
             //se cuenta cuantos pedidos tiene
            $num=DB::select("SELECT COUNT(productos.clave) as 'num' FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");

                return  view('front.index')->with('productos',$Prod)
                ->with('pedidos',$pedidos)
                ->with('total',$total)
                ->with('numero',$num);
                }
            else{
              return back()->withErrors(['password'=>'Contraseña incorrecta'])
              ->withInput(request(['usuario','password']));
              }      
      }
      else{
        return back()->withErrors(['usuario'=>'Este usuario no existe o no se encuentra registrado'])
        ->withInput(request(['password','usuario']));
      }
      }else{
        //se le informa que su cuneta aun no ha sido activada
        return back()->withErrors(['noaut'=>'Su cuenta aun no ha sido autorizada por el administrador']);
      }
     

     
    }



    

      //cierra la sesion del empleado
    public function salir()
   {
    Session::flush();
    Session::reflash();
    Cache::flush();
    Cookie::forget('laravel_session');
    //unset($_COOKIE);
    unset($_SESSION);
    return Redirect::to('/');
   }
   //cierra la sesion del cliente
    public function salircli()
   {
    Session::flush();
    Session::reflash();
    Cache::flush();
    Cookie::forget('laravel_session');
    //unset($_COOKIE);
    unset($_SESSION);
    return Redirect::to('login_cli');
   }


//regresa la vista de clientes
   public function Mutuarios(){
      return view('admin.views.mutuarios');
    }
    //regresa la vista de empleados
    public function Empleados(){
      return view('admin.views.empleados');
    }
    //regresa la vista de productos
    public function Cotizar(){
      return view('admin.views.productos');
    }
    //regresa la vista para un invitado
    public function Invitado(){
               $Prod=DB::select("SELECT * FROM productos INNER JOIN albums ON albums.id_album=productos.id_album WHERE albums.publicado='SI'AND albums.cancelado='NO'");
              $cr=Session::get('curp');
              $pedidos=DB::select("SELECT productos.precioventa  as precio,productos.descripcion as des,productos.photo,albums.album as album  FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda INNER JOIN albums on productos.id_album=albums.id_album WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");

              $total=DB::select("SELECT SUM(productos.precioventa) as 'total' FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");
             $num=DB::select("SELECT COUNT(productos.clave) as 'num' FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");
                return  view('front.index')->with('productos',$Prod)
                ->with('pedidos',$pedidos)
                ->with('total',$total)
                ->with('numero',$num);
    }
    //retorna vista Acerca de
    public function About(){
      $Prod=DB::select("SELECT * FROM productos INNER JOIN albums ON albums.id_album=productos.id_album WHERE albums.publicado='SI'");
              $cr=Session::get('curp');
              $pedidos=DB::select("SELECT productos.precioventa  as precio,productos.descripcion as des,productos.photo,albums.album as album  FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda INNER JOIN albums on productos.id_album=albums.id_album WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");

              $total=DB::select("SELECT SUM(productos.precioventa) as 'total' FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");
             $num=DB::select("SELECT COUNT(productos.clave) as 'num' FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");

                return  view('front.about')->with('productos',$Prod)
                ->with('pedidos',$pedidos)
                ->with('total',$total)
                ->with('numero',$num);
    }
    //retorna vista mi carrito
    public function MyCarrito(){
      $Prod=DB::select("SELECT * FROM productos INNER JOIN albums ON albums.id_album=productos.id_album WHERE albums.publicado='SI'");
              $cr=Session::get('curp');
              $pedidos=DB::select("SELECT productos.precioventa  as precio,comentarios.cla as codigo,productos.descripcion as des,productos.photo,albums.album as album  FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda INNER JOIN albums on productos.id_album=albums.id_album WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");

              $total=DB::select("SELECT SUM(productos.precioventa) as 'total' FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");
             $num=DB::select("SELECT COUNT(productos.clave) as 'num' FROM comentarios INNER JOIN productos on productos.clave=comentarios.prenda WHERE comentarios.id_usuario='$cr' AND comentarios.entregado='NO' AND comentarios.cancelado='NO'");

                return  view('front.micarrito')->with('productos',$Prod)
                ->with('pedidos',$pedidos)
                ->with('total',$total)
                ->with('numero',$num);
    }


}
