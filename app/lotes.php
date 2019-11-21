<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lotes extends Model
{
    protected $fillable = [
		'Id',
		'nombre',
		'numeroempleado',
		'descripcion',
		'estado'
	];
}
