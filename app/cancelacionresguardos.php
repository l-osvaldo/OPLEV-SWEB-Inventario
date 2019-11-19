<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cancelacionresguardos extends Model
{
    protected $fillable = [
        'Id',
        'numempleado',
        'nombreempleado',
        'idarea',
        'nombrearea',
    ];
}
