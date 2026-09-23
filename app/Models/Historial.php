<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Historial extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'historial';

    protected $fillable = [
        'aprendiz_id',
        'accion',
        'datos'
    ];
}
