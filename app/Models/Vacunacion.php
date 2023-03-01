<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacunacion extends Model
{
    use HasFactory;

    protected $table = 'vacunacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'tipo_vacuna',
        'fecha_vacunacion',
        'proxima_vacunacion',
        'nombre',
        'mascota_id',
        'veterinaria_id',
        'usuario_id',
    ];

    public function veterinaria(){
        return $this->belongsTo('App\Models\Veterinaria', 'veterinaria_id', 'id');
    }
}
