<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\partidas;
use App\lineas;
use App\sublineas;

class lineas extends Model
{
    //
    protected $fillable = [  
      'partida',
      'descpartida',
      'linea',
      'desclinea',
        
      ];



      //funcion para unir lineas y partidas

      public function partidas()
        {
        return $this->belongsTo(partidas::class, 'partida');
        }

        public function sublineas()
      {
            return $this->hasMany(sublineas::class);
      }
}
