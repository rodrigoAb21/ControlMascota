<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'fecha_consulta',
        'sintomas',
        'diagnostico',
        'fecha_control',
        'mascota_id',
        'veterinaria_id',
    ];

    public function tratamientos(){
        return $this->hasMany(Tratamiento::class);
    }

    public function veterinaria(){
        return $this->belongsTo('App\Veterinaria', 'veterinaria_id', 'id');
    }
}
