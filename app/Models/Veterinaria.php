<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinaria extends Model
{
    use HasFactory;

    protected $table = 'veterinaria';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono1',
        'telefono2',
        'horas',
        'latitud',
        'longitud',
    ];
}
