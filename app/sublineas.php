<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sublineas extends Model
{
    //
    protected $fillable = [
        'sublinea',
        'partida',
        'descpartida',
        'linea',
        'desclinea',
        'descsub',
        'total',
      ];
}
