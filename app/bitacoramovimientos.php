<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bitacoramovimientos extends Model
{
    protected $fillable = [
		'numeroinventario',
		'numeroempleado',
		'nombreempleado',
		'idarea',
		'nombrearea',
		'anterior'
	];
}
