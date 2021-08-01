<?php

namespace App\Http\Controllers;

use App\Vacunacion;
use Illuminate\Http\Request;

class VacunacionController extends Controller
{
    public function index($mascota_id)
    {
        return view('vistas.vacunaciones.index',
            [
                'vacunaciones' => Vacunacion::where('mascota_id', '=', $mascota_id)->get()
            ]);
    }

    public function create()
    {
        return view('vistas.vacunaciones.create');
    }

    public function store(Request $request)
    {
        $vacunacion = new Vacunacion();
        $vacunacion->nombre = $request['nombre'];
        $vacunacion->fecha_vacuna = $request['fecha_vacuna'];
        $vacunacion->fecha_validez = $request['fecha_validez'];
        $vacunacion->detalle = $request['detalle'];
        $vacunacion->mascota_id = $request['mascota_id'];
        $vacunacion->save();

        return redirect('vacunaciones');
    }

    public function show($id)
    {
        return view('vistas.vacunaciones.show', ['vacunacion' => Vacunacion::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('vistas.vacunaciones.edit', ['vacunacion' => Vacunacion::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $vacunacion = Vacunacion::findOrFail($id);
        $vacunacion->nombre = $request['nombre'];
        $vacunacion->fecha_vacuna = $request['fecha_vacuna'];
        $vacunacion->fecha_validez = $request['fecha_validez'];
        $vacunacion->detalle = $request['detalle'];
        $vacunacion->mascota_id = $request['mascota_id'];
        $vacunacion->update();

        return redirect('vacunaciones');
    }

    public function destroy($id)
    {
        $vacunacion = Vacunacion::findOrFail($id);
        $vacunacion->delete();

        return redirect('vacunacion');
    }
}
