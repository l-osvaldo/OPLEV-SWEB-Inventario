<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\partidas;

class lineas extends Model
{
    //
    protected $fillable = [
        'linea',
        'desclinea',
        'partida',
      ];

      //funcion para unir lineas y partidas

      public function partidas()
        {
        return $this->belongsTo(partidas::class, 'partida');
        }
}
