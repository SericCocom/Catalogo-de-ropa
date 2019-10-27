<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
	
    protected $table='categorias';

   	// Se especificar la clave primaria
   	protected $primaryKey='clave';
   	//Solo cuando la PK no sea numerica
   	public $incrementing=false;
   	//Activo las etiquetas de tiempo
   	public $timestamps=false;
   	//Definimos los campos que van a recibir valor
   	protected $fillable=[
    'categoria'
    
   	];


    
}
