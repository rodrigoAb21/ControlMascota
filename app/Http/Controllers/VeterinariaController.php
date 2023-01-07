<?php

namespace App\Http\Controllers;

use App\Models\Veterinaria;
use Illuminate\Http\Request;

class VeterinariaController extends Controller
{
    public function index()
    {
        return view('vistas.veterinarias.index',
            [
                'veterinarias' => Veterinaria::orderBy('id', 'asc')->get(),
            ]
        );
    }

    public function create()
    {
        return view('vistas.veterinarias.create');
    }

    public function store(Request $request)
    {
        $veterinaria = new Veterinaria();
        $veterinaria->nombre = $request['nombre'];
        $veterinaria->direccion = $request['direccion'];
        $veterinaria->telefono1 = $request['telefono1'];
        $veterinaria->telefono2 = $request['telefono2'];
        $veterinaria->latitud = $request['latitud'];
        $veterinaria->longitud = $request['longitud'];
        $veterinaria->save();

        return redirect('veterinarias');
    }

    public function show($id)
    {
        return view('vistas.veterinarias.show', ['veterinaria' => Veterinaria::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('vistas.veterinarias.edit', ['veterinaria' => Veterinaria::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $veterinaria = Veterinaria::findOrFail($id);
        $veterinaria->nombre = $request['nombre'];
        $veterinaria->direccion = $request['direccion'];
        $veterinaria->telefono1 = $request['telefono1'];
        $veterinaria->telefono2 = $request['telefono2'];
        $veterinaria->latitud = $request['latitud'];
        $veterinaria->longitud = $request['longitud'];
        $veterinaria->update();

        return redirect('veterinarias');
    }

    public function destroy($id)
    {
        $veterinaria = Veterinaria::findOrFail($id);
        $veterinaria->delete();

        return redirect('veterinarias');
    }
}
