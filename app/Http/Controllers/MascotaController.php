<?php

namespace App\Http\Controllers;

use App\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    private $tipos = [
        'Felino',
        'Canino'
    ];

    public function index()
    {
        return view('vistas.mascotas.index', ['mascotas' => Mascota::orderBy('id', 'asc')->get()]);
    }

    public function create()
    {
        return view('vistas.mascotas.create', ['tipos' => $this->tipos]);
    }

    public function store(Request $request)
    {
        $mascota = new Mascota();
        $mascota->nombre = $request['nombre'];
        $mascota->fecha_nac = $request['fecha_nac'];
        $mascota->tipo = $request['tipo'];
        $mascota->sexo = $request['sexo'];
        $mascota->save();

        return redirect('mascotas');
    }

    public function show($id)
    {
        return view('vistas.mascotas.show', ['mascota' => Mascota::findOrFail($id)]);
    }

    public function edit($id)
    {

        return view('vistas.mascotas.edit', [
            'mascota' => Mascota::findOrFail($id),
            'tipos' => $this->tipos
            ]);
    }

    public function update(Request $request, $id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->nombre = $request['nombre'];
        $mascota->fecha_nac = $request['fecha_nac'];
        $mascota->tipo = $request['tipo'];
        $mascota->sexo = $request['sexo'];
        $mascota->update();

        return redirect('mascotas');
    }

    public function destroy($id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->delete();

        return redirect('mascotas');
    }
}
