<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function editar(){
        return view('auth.editar',['usuario' => Auth::user()]);
    }
    public function actualizar(Request $request)
    {
        $id = Auth::id();
        $this->validate($request, [
            'email' => "required|max:255|email|unique:usuario,email,$id",
        ]);
        $usuario = User::findOrFail($id);
        $usuario->nombre = $request['nombre'];
        $usuario->email = $request['email'];
        if (trim($request['password']) != ''){
            $usuario->password = bcrypt($request['password']);
        }
        $usuario->update();

        return redirect('/');
    }

    public function eliminar()
    {
        $id = Auth::id();
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect('/');
    }
}
