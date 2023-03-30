<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesparasitacionFormRequest;
use App\Models\Desparasitacion;
use App\Models\Mascota;
use App\Models\Veterinaria;
use Illuminate\Support\Facades\Auth;

class DesparasitacionController extends Controller
{
    public function index($mascota_id)
    {
        $mascota = Mascota::findOrFail($mascota_id);
        if ($mascota->usuario_id == Auth::id() || Auth::user()->admin){
            if (Auth::user()->admin) {
                $desparasitaciones = Desparasitacion::where('mascota_id','=',$mascota_id)
                    ->orderBy('id', 'desc')
                    ->get();
            } else {
                $desparasitaciones = Desparasitacion::where('mascota_id','=',$mascota_id)
                    ->where('usuario_id','=', Auth::id())
                    ->orderBy('id', 'desc')
                    ->get();
            }

            return view('vistas.desparasitaciones.index',
                [
                    'desparasitaciones' => $desparasitaciones,
                    'mascota' => $mascota,
                ]);
        }
        return redirect('mascotas');

    }

    public function create($mascota_id)
    {
        $mascota = Mascota::findOrFail($mascota_id);
        if ($mascota->usuario_id == Auth::id() || Auth::user()->admin){
            return view('vistas.desparasitaciones.create',
                [
                    'mascota_id' => $mascota_id,
                    'veterinarias' => Veterinaria::where('usuario_id', '=', Auth::id())->get(),
                ]);
        }
        return redirect('mascotas');
    }

    public function store($mascota_id, DesparasitacionFormRequest $request)
    {
        $desparasitacion = new Desparasitacion();
        $desparasitacion->nombre = $request['nombre'];
        $desparasitacion->peso = $request['peso'];
        $desparasitacion->fecha_desparasitacion = $request['fecha_desparasitacion'];
        $desparasitacion->proxima_desparasitacion = $request['proxima_desparasitacion'];
        $desparasitacion->costo = $request['costo'];
        $desparasitacion->mascota_id = $mascota_id;
        $desparasitacion->veterinaria_id = $request['veterinaria_id'];
        $desparasitacion->usuario_id = Auth::id();
        $desparasitacion->save();

        return redirect('mascotas/'.$mascota_id.'/desparasitaciones');
    }

    public function edit($mascota_id, $id)
    {
        $desparasitacion = Desparasitacion::findOrFail($id);
        if ($desparasitacion->usuario_id == Auth::id() || Auth::user()->admin) {
            return view('vistas.desparasitaciones.edit', [
                'desparasitacion' => $desparasitacion,
                'mascota_id' => $mascota_id,
                'veterinarias' => Veterinaria::where('usuario_id', '=', Auth::id())->get(),
            ]);
        }

        return redirect('mascotas');

    }

    public function update($mascota_id, DesparasitacionFormRequest $request, $id)
    {
        $desparasitacion = Desparasitacion::findOrFail($id);
        $desparasitacion->nombre = $request['nombre'];
        $desparasitacion->peso = $request['peso'];
        $desparasitacion->fecha_desparasitacion = $request['fecha_desparasitacion'];
        $desparasitacion->proxima_desparasitacion = $request['proxima_desparasitacion'];
        $desparasitacion->costo = $request['costo'];
        $desparasitacion->veterinaria_id = $request['veterinaria_id'];
        $desparasitacion->update();

        return redirect('mascotas/'.$mascota_id.'/desparasitaciones');
    }


    public function destroy($mascota_id, $id)
    {
        $desparasitacion = Desparasitacion::findOrFail($id);
        if ($desparasitacion->usuario_id == Auth::id() || Auth::user()->admin){
            $desparasitacion->delete();
        }

        return redirect('mascotas/'.$mascota_id.'/desparasitaciones');
    }

}
