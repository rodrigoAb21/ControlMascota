<?php

namespace App\Http\Controllers;

use App\Desparasitacion;
use Illuminate\Http\Request;

class DesparasitacionController extends Controller
{
    public function index($id)
    {
        return view('vistas.desparasitaciones.index',
            [
                'desparasitaciones' => Desparasitacion::where('mascota_id','=',$id)->get()
            ]);
    }

    public function create()
    {
        return view('vistas.desparasitaciones.create');
    }

    public function store(Request $request)
    {
        $desparasitacion = new Desparasitacion();
        $desparasitacion->nombre = $request['nombre'];
        $desparasitacion->fecha_vacuna = $request['fecha_vacuna'];
        $desparasitacion->fecha_validez = $request['fecha_validez'];
        $desparasitacion->mascota_id = $request['mascota_id'];
        $desparasitacion->save();

        return redirect('desparasitaciones');
    }

    public function show($id)
    {
        return view('vistas.desparasitaciones.show', ['desparasitacion' => Desparasitacion::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('vistas.desparasitaciones.edit', ['desparasitacion' => Desparasitacion::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $desparasitacion = Desparasitacion::findOrFail($id);
        $desparasitacion->nombre = $request['nombre'];
        $desparasitacion->fecha_vacuna = $request['fecha_vacuna'];
        $desparasitacion->fecha_validez = $request['fecha_validez'];
        $desparasitacion->mascota_id = $request['mascota_id'];
        $desparasitacion->update();

        return redirect('desparasitaciones');
    }

    public function destroy($id)
    {
        $desparasitacion = Desparasitacion::findOrFail($id);
        $desparasitacion->delete();

        return redirect('desparasitacion');
    }
}
