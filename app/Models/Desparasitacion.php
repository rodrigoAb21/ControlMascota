<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desparasitacion extends Model
{
    use HasFactory;

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