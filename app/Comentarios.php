<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
	
    protected $table='comentarios';

   	// Se especificar la clave primaria
   protected $primaryKey='id_usuario';
   	//Solo cuando la PK no sea numerica
   	public $incrementing=false;
   	//Activo las etiquetas de tiempo
   	public $timestamps=true;
   	//Definimos los campos que van a recibir valor
   	protected $fillable=[
   	'clave',
    'talla',
    'precioventa',
    'preciocompra',
    'id_album',
    'categoria','photo','descripcion'
    
   	];


    
}
