<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\lineas;

class partidas extends Model
{
    protected $fillable = [
        'partida',
        'descpartida',
      ];


      //funcion para unir partidas y lineas
      public function lineas()
      {
            return $this->hasMany(lineas::class);
      }
      
    //
/*
    public function save($partida)
        {
            $this->partida = $partida['partida'];
            $this->descpartida = $partida['descpartida'];
            $this->save();
            return 1;
        }
        */
        
}
