<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
Use DB;

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

        $cliente = Clientes::all()->where('autorizado','SI');
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
     $Cliente=new Clientes;
     $Cliente->curp =$request->get('curp');
     $Cliente->nombre =$request->get('nombre');
     $Cliente->apellidop =$request->get('apellidop');
     $Cliente->apellidom =$request->get('apellidom');
     $Cliente->direccion =$request->get('direccion');
     $Cliente->email =$request->get('correo');
     $Cliente->telefono =$request->get('telefono');
     $Cliente->password =$request->get('password');
     $Cliente->usuario =$request->get('usuario');
     $Cliente->save();
     return $Cliente;

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
    public function Solicitud(Request $request){

          $credentials=$this->validate(request(),[
            'curp'=>'required|string',
            'nombre'=>'required|string',
            'apellidop'=>'required|string',
            'apellidom'=>'required|string',
            'email'=>'required|string',
            'telefono'=>'required|string',
            'direccion'=>'required|string',
            'usuario'=>'required|string',
            'password'=>'required|string'

        ]);
          $curpv =$request->get('curp');
          $datos=DB::table('clientes')->select('curp')
          ->where('curp',$curpv)
          ->first();
          if (empty($datos)) {
            
            $usuario =$request->get('usuario');
          $datos2=DB::table('clientes')->select('usuario')
          ->where('usuario',$usuario)
          ->first();
                if (empty($datos2)) {
                    $Cliente=new Clientes;
                    $Cliente->curp =$request->get('curp');
                    $Cliente->nombre =$request->get('nombre');
                    $Cliente->apellidop =$request->get('apellidop');
                    $Cliente->apellidom =$request->get('apellidom');
                    $Cliente->direccion =$request->get('direccion');
                    $Cliente->email =$request->get('email');
                    $Cliente->telefono =$request->get('telefono');
                    $Cliente->password =$request->get('password');
                    $Cliente->usuario =$request->get('usuario');
                    $Cliente->save();
                    return back()->withErrors(['succes'=>'Cuenta agregada, espere la autorización del administrador']);
                }else{
                    return back()->withErrors(['fail'=>'El usuario ya se encuentra registrado, regrese al formulario e ingrese otro'])
                    ->withInput(request(['curp','password','telefono','nombre','apellidop','apellidom','email','direccion']));
                }

          }else{
            return back()->withErrors(['fail'=>'Esta CURP ya se encuentra registrada,vuelva al formulario'])
            ->withInput(request(['password','usuario','telefono','nombre','apellidop','apellidom','email','direccion']));
          }

      return $credentials;
    }
}
