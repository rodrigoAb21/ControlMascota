<?php

namespace App\Http\Controllers;

use App\Models\Desparasitacion;
use App\Models\Mascota;
use App\Models\Veterinaria;
use Illuminate\Http\Request;

class DesparasitacionController extends Controller
{
    public function index($mascota_id)
    {
        return view('vistas.desparasitaciones.index',
            [
                'desparasitaciones' => Desparasitacion::where('mascota_id','=',$mascota_id)->orderBy('id', 'asc')->get(),
                'mascota' => Mascota::findOrFail($mascota_id),
            ]);
    }

    public function create($mascota_id)
    {

        return view('vistas.desparasitaciones.create',
            [
                'mascota_id' => $mascota_id,
                'veterinarias' => Veterinaria::all(),
            ]);
    }

    public function store($mascota_id, Request $request)
    {
        $desparasitacion = new Desparasitacion();
        $desparasitacion->nombre = $request['nombre'];
        $desparasitacion->peso = $request['peso'];
        $desparasitacion->fecha_vacuna = $request['fecha_vacuna'];
        $desparasitacion->fecha_validez = $request['fecha_validez'];
        $desparasitacion->mascota_id = $mascota_id;
        $desparasitacion->veterinaria_id = $request['veterinaria_id'];
        $desparasitacion->save();

        return redirect('mascotas/'.$mascota_id.'/desparasitaciones');
    }

    public function edit($mascota_id, $id)
    {
        return view('vistas.desparasitaciones.edit',
            [
                'desparasitacion' => Desparasitacion::findOrFail($id),
                'mascota_id' => $mascota_id,
                'veterinarias' => Veterinaria::all(),
            ]);
    }

    public function update($mascota_id, Request $request, $id)
    {
        $desparasitacion = Desparasitacion::findOrFail($id);
        $desparasitacion->nombre = $request['nombre'];
        $desparasitacion->peso = $request['peso'];
        $desparasitacion->fecha_vacuna = $request['fecha_vacuna'];
        $desparasitacion->fecha_validez = $request['fecha_validez'];
        $desparasitacion->veterinaria_id = $request['veterinaria_id'];
        $desparasitacion->update();

        return redirect('mascotas/'.$mascota_id.'/desparasitaciones');
    }


    public function destroy($mascota_id, $id)
    {
        $desparasitacion = Desparasitacion::findOrFail($id);
        $desparasitacion->delete();

        return redirect('mascotas/'.$mascota_id.'/desparasitaciones');
    }

}
