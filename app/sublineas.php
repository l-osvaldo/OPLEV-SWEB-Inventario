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
        'totalople',
        'totaleco'
      ];
      public function partidas()
      {
      return $this->belongsTo(partidas::class, 'partida');
      }


      public function lineas()
        {
        return $this->belongsTo(lineas::class, 'partida');
        }
}
