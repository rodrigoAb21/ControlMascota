<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $table = 'consulta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha_consulta',
        'motivo',
        'diagnostico',
        'fecha_control',
        'costo',
        'mascota_id',
        'veterinaria_id',
        'usuario_id',
    ];

    public function tratamientos(){
        return $this->hasMany(Tratamiento::class);
    }

    public function veterinaria(){
        return $this->belongsTo('App\Models\Veterinaria', 'veterinaria_id', 'id');
    }
}
