<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Operacion;
use App\Models\Veterinaria;
use Illuminate\Http\Request;

class OperacionController extends Controller
{
    public function index($mascota_id)
    {
        return view('vistas.operaciones.index',
            [
                'operaciones' => Operacion::where('mascota_id', '=', $mascota_id)->orderBy('id', 'asc')->get(),
                'mascota' => Mascota::findOrFail($mascota_id),
            ]);
    }

    public function create($mascota_id)
    {
        return view('vistas.operaciones.create',
            [
                'mascota_id' => $mascota_id,
                'veterinarias' => Veterinaria::all(),
            ]);
    }

    public function store($mascota_id, Request $request)
    {
        $operacion = new Operacion();
        $operacion->descripcion = $request['descripcion'];
        $operacion->fecha = $request['fecha'];
        $operacion->mascota_id = $mascota_id;
        $operacion->veterinaria_id = $request['veterinaria_id'];
        $operacion->save();

        return redirect('mascotas/'.$mascota_id.'/operaciones');
    }

    public function edit($mascota_id, $id)
    {
        return view('vistas.operaciones.edit',
            [
                'operacion' => Operacion::findOrFail($id),
                'mascota_id' => $mascota_id,
                'veterinarias' => Veterinaria::all(),
            ]);
    }

    public function update($mascota_id, Request $request, $id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->descripcion = $request['descripcion'];
        $operacion->fecha = $request['fecha'];
        $operacion->veterinaria_id = $request['veterinaria_id'];
        $operacion->update();

        return redirect('mascotas/'.$mascota_id.'/operaciones');
    }

    public function destroy($mascota_id, $id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->delete();

        return redirect('mascotas/'.$mascota_id.'/operaciones');
    }
}
