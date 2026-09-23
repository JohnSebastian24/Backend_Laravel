<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aprendiz extends Model
{

    protected $table = 'aprendiz';


    protected $fillable = [

        'apellido',
        'direccion',
        'email',
        'nombre',
        'telefono',
        'rh',
        'estado',
        'ficha',
        'programa',
        'regional'

    ];


    public $timestamps = false;

}