<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desparasitacion extends Model
{
    protected $table = 'desparasitacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'fecha_vacuna',
        'fecha_validez',
        'mascota_id',
    ];
}
