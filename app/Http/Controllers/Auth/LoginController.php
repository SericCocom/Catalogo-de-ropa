<?php

namespace App\Http\Controllers\Auth;
use Auth;
use DB;
use Session;
use Cache;
use Cookie;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login(Request $request){

     $credentials=   $this->validate(request(),[
            'usuario'=>'required|string',
            'password'=>'required|string'

        ]);
     

    $usuario=$request->get('usuario');
    $password=$request->get('password');
    
    $datos=DB::table('users')->select('usuario')
    ->where('usuario',$usuario)
    ->first();
    
    
       if (!empty($datos)){

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

                return view('admin.layouts.contenedor');
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
     

     
    }

    public function loginCli(Request $request){

     $credentials=   $this->validate(request(),[
            'usuario'=>'required|string',
            'password'=>'required|string'

        ]);
     

    $usuario=$request->get('usuario');
    $password=$request->get('password');
    
    $datos=DB::table('clientes')->select('usuario')
    ->where('usuario',$usuario)
    ->first();
    
    
       if (!empty($datos)){

            $datos2=DB::table('clientes')->select('password')
            ->where('password',$password)
            ->first();

             if (!empty($datos2)) {
                 $empleado=DB::table('clientes')->select('password','nombre','apellidop','apellidom','curp')
            ->where('usuario',$usuario)
            ->where('password',$password)
            ->get();
            Session::put('curp',$empleado[0]->curp);
            Session::put('nombre',$empleado[0]->nombre);
            Session::put('apellidop',$empleado[0]->apellidop);
            Session::put('apellidom',$empleado[0]->apellidom);
            

                return  'Sesion iniciada';
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
     

     
    }



    


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

   public function Mutuarios(){
      return view('admin.views.mutuarios');
    }
    public function Empleados(){
      return view('admin.views.empleados');
    }
    public function Cotizar(){
      return view('admin.views.productos');
    }


}
