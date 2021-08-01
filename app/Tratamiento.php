<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $table = 'tratamiento';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'medicamento',
        'dosis',
        'cantidad_dias',
        'presentacion',
        'consulta_id',
    ];
}
