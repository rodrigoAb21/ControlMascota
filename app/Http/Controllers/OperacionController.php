<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Operacion;
use App\Models\Veterinaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperacionController extends Controller
{
    public function index($mascota_id)
    {
        $mascota = Mascota::findOrFail($mascota_id);
        if ($mascota->usuario_id == Auth::id() || Auth::user()->admin){
            if (Auth::user()->admin) {
                $operaciones = Operacion::where('mascota_id','=',$mascota_id)
                    ->orderBy('id', 'desc')
                    ->get();
            } else {
                $operaciones = Operacion::where('mascota_id','=',$mascota_id)
                    ->where('usuario_id','=', Auth::id())
                    ->orderBy('id', 'desc')
                    ->get();
            }

            return view('vistas.operaciones.index',
                [
                    'operaciones' => $operaciones,
                    'mascota' => Mascota::findOrFail($mascota_id),
                ]);
        }
        return redirect('mascotas');

    }

    public function create($mascota_id)
    {
        $mascota = Mascota::findOrFail($mascota_id);
        if ($mascota->usuario_id == Auth::id() || Auth::user()->admin){
            return view('vistas.operaciones.create',
                [
                    'mascota_id' => $mascota_id,
                    'veterinarias' => Veterinaria::all(),
                ]);
        }
        return redirect('mascotas');
    }

    public function store($mascota_id, Request $request)
    {
        $operacion = new Operacion();
        $operacion->descripcion = $request['descripcion'];
        $operacion->fecha = $request['fecha'];
        $operacion->costo = $request['costo'];
        $operacion->mascota_id = $mascota_id;
        $operacion->veterinaria_id = $request['veterinaria_id'];
        $operacion->usuario_id = Auth::id();
        $operacion->save();

        return redirect('mascotas/'.$mascota_id.'/operaciones');
    }

    public function edit($mascota_id, $id)
    {
        $operacion = Operacion::findOrFail($id);
        if ($operacion->usuario_id == Auth::id() || Auth::user()->admin) {
            return view('vistas.operaciones.edit',
                [
                    'operacion' => $operacion,
                    'mascota_id' => $mascota_id,
                    'veterinarias' => Veterinaria::all(),
                ]);
        }
        return redirect('mascotas');
    }

    public function update($mascota_id, Request $request, $id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->descripcion = $request['descripcion'];
        $operacion->fecha = $request['fecha'];
        $operacion->costo = $request['costo'];
        $operacion->veterinaria_id = $request['veterinaria_id'];
        $operacion->update();

        return redirect('mascotas/'.$mascota_id.'/operaciones');
    }

    public function destroy($mascota_id, $id)
    {
        $operacion = Operacion::findOrFail($id);
        if ($operacion->usuario_id == Auth::id() || Auth::user()->admin){
            $operacion->delete();
            return redirect('mascotas/'.$mascota_id.'/operaciones');
        }
        return redirect('mascotas');
    }
}
