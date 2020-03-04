<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articulos extends Model
{
    //
    protected $fillable = [
        'iev',
        'partida',
        'descpartida',
        'linea',
        'desclinea',
        'sublinea',
        'descsublinea',
        'consecutivo',
        'numeroinv',
        'concepto',
        'marca',
        'importe',
        'colores',
        'fechacomp',
        'idarea',
        'nombrearea',
        'numemple',
        'nombreemple',
        'numserie',
        'medidas',
        'modelo',
        'material',
        'clvestado',
        'estado',
        'factura',
        'idclasi',
    ];

}
