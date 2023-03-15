<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Veterinaria;
use App\Models\Vacunacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacunacionController extends Controller
{
    public function index($mascota_id)
    {
        $mascota = Mascota::findOrFail($mascota_id);
        if ($mascota->usuario_id == Auth::id() || Auth::user()->admin) {
            if (Auth::user()->admin) {
                $vacunaciones = Vacunacion::where('mascota_id', '=', $mascota_id)
                ->orderBy('id', 'desc')
                ->get();    
            } else {
                $vacunaciones = Vacunacion::where('mascota_id', '=', $mascota_id)
                ->where('usuario_id', '=', Auth::id())
                ->orderBy('id', 'desc')
                ->get();
            }

            return view('vistas.vacunaciones.index',
                [
                    'vacunaciones' => $vacunaciones,
                    'mascota' => $mascota,
                ]);     
            
        }

        return redirect('mascotas');

        
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
        $vacunacion->tipo_vacuna = $request['tipo_vacuna'];
        $vacunacion->fecha_vacunacion = $request['fecha_vacunacion'];
        $vacunacion->proxima_vacunacion = $request['proxima_vacunacion'];
        $vacunacion->nombre = $request['nombre'];
        $vacunacion->costo = $request['costo'];
        $vacunacion->mascota_id = $mascota_id;
        $vacunacion->veterinaria_id = $request['veterinaria_id'];
        $vacunacion->usuario_id = Auth::id();
        $vacunacion->save();

        return redirect('mascotas/'.$mascota_id.'/vacunaciones');
    }

    public function edit($mascota_id, $id)
    {
        $vacunacion = Vacunacion::findOrFail($id);
        if ($vacunacion->usuario_id == Auth::id() || Auth::user()->admin) {
            return view('vistas.vacunaciones.edit', [
                'vacunacion' => $vacunacion,
                'mascota_id' => $mascota_id,
                'veterinarias' => Veterinaria::all(),
            ]);    
        }

        return redirect('mascotas');
    }

    public function update($mascota_id, Request $request, $id)
    {
        $vacunacion = Vacunacion::findOrFail($id);
        $vacunacion->tipo_vacuna = $request['tipo_vacuna'];
        $vacunacion->fecha_vacunacion = $request['fecha_vacunacion'];
        $vacunacion->proxima_vacunacion = $request['proxima_vacunacion'];
        $vacunacion->nombre = $request['nombre'];
        $vacunacion->costo = $request['costo'];
        $vacunacion->veterinaria_id = $request['veterinaria_id'];
        $vacunacion->update();

        return redirect('mascotas/'.$mascota_id.'/vacunaciones');
    }

    public function destroy($mascota_id,$id)
    {
        $vacunacion = Vacunacion::findOrFail($id);
        if ($vacunacion->usuario_id == Auth::id() || Auth::user()->admin) {
            $vacunacion->delete();
            return redirect('mascotas/'.$mascota_id.'/vacunaciones');  
        }

        return redirect('mascotas');
    }
}
