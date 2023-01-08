<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    use HasFactory;

    protected $table = 'operacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'descripcion',
        'fecha',
        'mascota_id',
    ];
}