<?php

namespace SisArchivos;

use Illuminate\Database\Eloquent\Model;

class Personeria extends Model
{
    protected $table='personeria';
  	protected $primaryKey= 'idpersoneria';
  	public $timestamps =false;

  	protected $fillable=[
      'hoja_ruta',
  		'nombre',
      'fecha_creacion',
      'representante_legal',
      'institucion_solicitante',
      'domicilio',
  		'archivo',
  		'estado'
  		];

  	protected $guarded =[
  		];
}
