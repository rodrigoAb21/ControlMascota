<?php

namespace App\Http\Controllers;

use App\Http\Requests\MascotaFormRequest;
use App\Models\Mascota;
use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{
    private $tipos = [
        'Felino',
        'Canino'
    ];

    public function index()
    {
        if (Auth::user()->admin) {
            $mascotas = Mascota::orderBy('id', 'desc')->get();
        } else {
            $mascotas = Mascota::where('usuario_id','=', Auth::id())->orderBy('id', 'desc')->get();
        }
        return view('vistas.mascotas.index', ['mascotas' => $mascotas]);
    }

    public function create()
    {
        return view('vistas.mascotas.create', ['tipos' => $this->tipos]);
    }

    public function store(MascotaFormRequest $request)
    {
        $mascota = new Mascota();
        $mascota->nombre = $request['nombre'];
        $mascota->fecha_nac = $request['fecha_nac'];
        $mascota->tipo = $request['tipo'];
        $mascota->sexo = $request['sexo'];
        $mascota->raza = $request['raza'];
        $mascota->color = $request['color'];
        $mascota->usuario_id = Auth::id();
        $mascota->save();

        return redirect('mascotas');
    }

    public function show($id)
    {
        $mascota = Mascota::findOrFail($id);
        if ($mascota->usuario_id == Auth::id() || Auth::user()->admin) {
            return view('vistas.mascotas.show', ['mascota' => $mascota]);
        } else {
            return redirect('mascotas');
        }
    }

    public function edit($id)
    {
        $mascota = Mascota::findOrFail($id);
        if ($mascota->usuario_id == Auth::id() || Auth::user()->admin) {
            return view('vistas.mascotas.edit', [
                'mascota' => $mascota,
                'tipos' => $this->tipos
            ]);
        } else {
            return redirect("mascotas");
        }
    }

    public function update(MascotaFormRequest $request, $id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->nombre = $request['nombre'];
        $mascota->fecha_nac = $request['fecha_nac'];
        $mascota->tipo = $request['tipo'];
        $mascota->sexo = $request['sexo'];
        $mascota->raza = $request['raza'];
        $mascota->color = $request['color'];
        $mascota->update();

        return redirect('mascotas');
    }

    public function destroy($id)
    {
        $mascota = Mascota::findOrFail($id);
        if ($mascota->usuario_id == Auth::id() || Auth::user()->admin) {
            $mascota->delete();
        }

        return redirect("mascotas");

    }
}
