<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
	
    protected $table='productos';

   	// Se especificar la clave primaria
   	protected $primaryKey='clave';
   	//Solo cuando la PK no sea numerica
   	public $incrementing=false;
   	//Activo las etiquetas de tiempo
   	public $timestamps=false;
   	//Definimos los campos que van a recibir valor
   	protected $fillable=[
   	'clave',
    'talla',
    'precioventa',
    'preciocompra',
    'id_album',
    'categoria','photo'
    
   	];


    
}
