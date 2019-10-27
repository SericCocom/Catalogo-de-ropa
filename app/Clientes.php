<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
	
    protected $table='clientes';

   	// Se especificar la clave primaria
   	protected $primaryKey='curp';
   	//Solo cuando la PK no sea numerica
   	public $incrementing=false;
   	//Activo las etiquetas de tiempo
   	public $timestamps=false;
   	//Definimos los campos que van a recibir valor
   	protected $fillable=[
   	'curp',
    'nombre',
    'apellidop',
    'apellidom',
    'direccion',
    'email',
    'telefono',
    'usuario',
    'password',
    
   	];


    
}
