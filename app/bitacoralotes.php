<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bitacoralotes extends Model
{
    protected $fillable = [
		'id_lote',
		'numeroinventario',
		'estatus'
	];
}
