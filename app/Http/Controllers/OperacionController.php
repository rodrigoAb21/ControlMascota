<?php

namespace App\Http\Controllers;

use App\Operacion;
use Illuminate\Http\Request;

class OperacionController extends Controller
{
    public function index($mascota_id)
    {
        return view('vistas.operaciones.index',
            [
                'operaciones' => Operacion::where('mascota_id', '=', $mascota_id)->get()
            ]);
    }

    public function create()
    {
        return view('vistas.operaciones.create');
    }

    public function store(Request $request)
    {
        $operacion = new Operacion();
        $operacion->descripcion = $request['descripcion'];
        $operacion->fecha = $request['fecha'];
        $operacion->mascota_id = $request['mascota_id'];
        $operacion->save();

        return redirect('operaciones');
    }

    public function show($id)
    {
        return view('vistas.operaciones.show', ['operacion' => Operacion::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('vistas.operaciones.edit', ['operacion' => Operacion::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->descripcion = $request['descripcion'];
        $operacion->fecha = $request['fecha'];
        $operacion->mascota_id = $request['mascota_id'];
        $operacion->update();

        return redirect('operaciones');
    }

    public function destroy($id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->delete();

        return redirect('operacion');
    }
}