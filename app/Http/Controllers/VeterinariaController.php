<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeterinariaFormRequest;
use App\Models\Veterinaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VeterinariaController extends Controller
{
    public function index()
    {
        if(Auth::user()->admin){
            $veterinarias = Veterinaria::orderBy('id', 'desc')->get();
        } else {
            $veterinarias = Veterinaria::where('usuario_id', '=', Auth::id())
            ->orderBy('id', 'desc')
            ->get();
        }
        return view('vistas.veterinarias.index',
            [
                'veterinarias' => $veterinarias,
            ]
        );
    }

    public function create()
    {
        return view('vistas.veterinarias.create');
    }

    public function store(VeterinariaFormRequest $request)
    {
        $veterinaria = new Veterinaria();
        $veterinaria->nombre = $request['nombre'];
        $veterinaria->direccion = $request['direccion'];
        $veterinaria->telefono = $request['telefono'];
        $veterinaria->celular = $request['celular'];
        $veterinaria->atencion = $request['atencion'];
        $veterinaria->latitud = $request['latitud'];
        $veterinaria->longitud = $request['longitud'];
        $veterinaria->usuario_id = Auth::id();
        $veterinaria->save();

        return redirect('veterinarias');
    }

    public function edit($id)
    {
        $veterinaria = Veterinaria::findOrFail($id);
        if ($veterinaria->usuario_id == Auth::id() || Auth::user()->admin) {
            return view('vistas.veterinarias.edit', ['veterinaria' => $veterinaria]);
        }

        return redirect('veterinarias');
    }

    public function update(VeterinariaFormRequest $request, $id)
    {
        $veterinaria = Veterinaria::findOrFail($id);
        $veterinaria->nombre = $request['nombre'];
        $veterinaria->direccion = $request['direccion'];
        $veterinaria->telefono = $request['telefono'];
        $veterinaria->celular = $request['celular'];
        $veterinaria->atencion = $request['atencion'];
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
