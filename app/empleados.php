<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    //
    protected $fillable = [
        'numemple',
        'nombre',
        'clvdepto',
        'nombredepto',
        'cargo',
      ];
}
