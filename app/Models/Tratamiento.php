<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $table = 'tratamiento';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'medicamento',
        'dosis',
        'cantidad_dias',
        'consulta_id',
    ];
}
