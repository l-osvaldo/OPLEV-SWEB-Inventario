<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class partidas extends Model
{
    protected $fillable = [
        'partida',
        'descpartida',
      ];
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
