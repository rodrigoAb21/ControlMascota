<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veterinaria extends Model
{
    protected $table = 'veterinaria';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono1',
        'telefono2',
        'latitud',
        'longitud',
    ];
}
