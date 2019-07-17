<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articulosecos extends Model
{
    //
	protected $fillable = [
			'iev',
			'partida',
			'descripcionpartida',
			'linea',
			'descripcionlinea',
			'sublinea',
			'descripcionsublinea',
			'consecutivo',
			'numeroinventario',
			'concepto',
			'marca',
			'importe',
			'colores',
			'fechacompra',
			'clavearea',
			'nombrearea',
			'numeroempleado',
			'nombreempleado',
			'numeroserie',
			'medidas',
			'modelo',
			'material',
			'claveestado',
			'estado',
			'factura',
		];
    
}