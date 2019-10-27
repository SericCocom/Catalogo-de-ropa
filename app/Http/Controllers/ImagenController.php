<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Productos;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this-> validate(request(),[
    		'photo'=>'image|max:2048'
    	]);
         $photo= $request->file('photo');
         $longitud=9;
          $nombre ='';
          $pattern = '1234567890';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $nombre .= $pattern{mt_rand(0,$max)};


    	$producto = new Productos;
    	$producto->photo=$nombre;
        $producto->clave=$nombre;
    	$producto->save();
   		
    	$photo->move(public_path().'/img/',$nombre);
		return $nombre;
    }
    
    public function show($id)
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
