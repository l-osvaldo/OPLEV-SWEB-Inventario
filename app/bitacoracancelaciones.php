<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bitacoracancelaciones extends Model
{
    //id_cancelacion
    protected $fillable = [
		'id_cancelacion',
		'numeroinventario',
		'asignado',
	];
}
