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
        'costo',
        'mascota_id',
        'veterinaria_id',
        'usuario_id',
    ];

    public function veterinaria(){
        return $this->belongsTo('App\Models\Veterinaria', 'veterinaria_id', 'id');
    }
}
