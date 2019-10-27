<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
	
    protected $table='albums';

   	// Se especificar la clave primaria
   	protected $primaryKey='id_albums';
   	//Solo cuando la PK no sea numerica
   	public $incrementing=false;
   	//Activo las etiquetas de tiempo
   	public $timestamps=false;
   	//Definimos los campos que van a recibir valor
   	protected $fillable=[
    'id_albums'
    
   	];


    
}
