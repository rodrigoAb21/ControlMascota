<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Veterinaria;
use App\Models  \Vacunacion;
use Illuminate\Http\Request;

class VacunacionController extends Controller
{
    public function index($mascota_id)
    {
        return view('vistas.vacunaciones.index',
            [
                'vacunaciones' => Vacunacion::where('mascota_id', '=', $mascota_id)->orderBy('id', 'asc')->get(),
                'mascota' => Mascota::findOrFail($mascota_id),
            ]);
    }

    public function create($mascota_id)
    {
        return view('vistas.vacunaciones.create',
            [
                'mascota_id' => $mascota_id,
                'veterinarias' => Veterinaria::all(),
            ]);
    }

    public function store($mascota_id, Request $request)
    {
        $vacunacion = new Vacunacion();
        $vacunacion->nombre = $request['nombre'];
        $vacunacion->fecha_vacuna = $request['fecha_vacuna'];
        $vacunacion->fecha_validez = $request['fecha_validez'];
        $vacunacion->detalle = $request['detalle'];
        $vacunacion->mascota_id = $mascota_id;
        $vacunacion->veterinaria_id = $request['veterinaria_id'];
        $vacunacion->save();

        return redirect('mascotas/'.$mascota_id.'/vacunaciones');
    }

    public function edit($mascota_id, $id)
    {
        return view('vistas.vacunaciones.edit', [
            'vacunacion' => Vacunacion::findOrFail($id),
            'mascota_id' => $mascota_id,
            'veterinarias' => Veterinaria::all(),
        ]);
    }

    public function update($mascota_id, Request $request, $id)
    {
        $vacunacion = Vacunacion::findOrFail($id);
        $vacunacion->nombre = $request['nombre'];
        $vacunacion->fecha_vacuna = $request['fecha_vacuna'];
        $vacunacion->fecha_validez = $request['fecha_validez'];
        $vacunacion->detalle = $request['detalle'];
        $vacunacion->veterinaria_id = $request['veterinaria_id'];
        $vacunacion->update();

        return redirect('mascotas/'.$mascota_id.'/vacunaciones');
    }

    public function destroy($mascota_id,$id)
    {
        $vacunacion = Vacunacion::findOrFail($id);
        $vacunacion->delete();

        return redirect('mascotas/'.$mascota_id.'/vacunaciones');
    }
}
