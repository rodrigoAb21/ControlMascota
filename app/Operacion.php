<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $table = 'operacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'descripcion',
        'fecha',
        'mascota_id',
    ];
}
