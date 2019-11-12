<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albums;
use DB;
class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $albums = DB::select("SELECT * FROM albums WHERE cancelado='NO' ORDER BY fecha_publica ASC");
        return $albums;

    }
    public function Publicado()
    {
        $albums = DB::select("SELECT * FROM albums WHERE publicado='SI' ORDER BY fecha_publica ASC");
        return $albums;

    }
    public function NOpublicado()
    {
        $albums = DB::select("SELECT * FROM albums WHERE publicado='NO' ORDER BY fecha_publica ASC");
        return $albums;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
     $albums=new Albums;
     $albums->id_album =$request->get('id_album');
    $albums->album =$request->get('album');
    $albums->fecha_publica =$request->get('fecha');
     $albums->save();
     return $albums;

    }

    public function show($id)
    {
        return Albums::find($id);
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
        Albums::findOrFail($id)->update($request->all());
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
    public function PublicarAlbum(Request $request){

         // DB::table('albums')
           //     ->where('id_album', $request->get('id_album'))
             //   ->update(['publicado' => 'SI']);
        //return 'El album ha sido publicado';
        $id_album=$request->get('id_album');
        $album=Albums::find($id_album);
        $album->publicado='SI';
        $album->update();
        return 'Album publicado';
    }
    public function CancelarAlbum(Request $request){

         // DB::table('albums')
           //     ->where('id_album', $request->get('id_album'))
             //   ->update(['publicado' => 'SI']);
        //return 'El album ha sido publicado';
        $id_album=$request->get('id_album');
        $album=Albums::find($id_album);
        $album->publicado='NO';
        $album->update();
        return 'Album cancelado';
    }



}
