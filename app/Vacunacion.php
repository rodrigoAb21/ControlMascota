<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacunacion extends Model
{
    protected $table = 'vacunacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'fecha_vacuna',
        'fecha_validez',
        'detalle',
        'mascota_id',
    ];
}
