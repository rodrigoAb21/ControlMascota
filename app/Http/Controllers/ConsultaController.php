<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultaFormRequest;
use App\Models\Consulta;
use App\Models\Mascota;
use App\Models\Tratamiento;
use App\Models\Veterinaria;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function index($mascota_id)
    {
        $mascota = Mascota::findOrFail($mascota_id);
        if ($mascota->usuario_id == Auth::id() || Auth::user()->admin) {
            if (Auth::user()->admin) {
                $consultas = Consulta::where('mascota_id', '=', $mascota_id)->orderBy('id', 'desc')->get();
            }
            else {
                $consultas = Consulta::where('mascota_id', '=', $mascota_id)
                ->where('usuario_id', '=', Auth::id())
                ->orderBy('id', 'desc')->get();
            }
        return view('vistas.consultas.index',
            [
                'consultas' => $consultas,
                'mascota' => $mascota,
            ]);
        }
        return redirect('mascotas');
        
    }

    public function create($mascota_id)
    {
        return view('vistas.consultas.create',
            [
                'veterinarias' => Veterinaria::where('usuario_id', '=', Auth::id())->get(),
                'mascota_id' => $mascota_id,
            ]
        );
    }

    public function store($mascota_id, ConsultaFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $consulta = new Consulta();
            $consulta->fecha_consulta = $request['fecha_consulta'];
            $consulta->motivo = $request['motivo'];
            $consulta->diagnostico = $request['diagnostico'];
            $consulta->fecha_control = $request['fecha_control'];
            $consulta->costo = $request['costo'];
            $consulta->veterinaria_id = $request['veterinaria_id'];
            $consulta->mascota_id = $mascota_id;
            $consulta->usuario_id = Auth::id();
            $consulta->save();


            $medicamentos = $request->get('medicamentoT');
            $dosis = $request->get('dosisT');
            $cantidad_dias = $request->get('cantidad_diasT');
            $cont = 0;


            if ($medicamentos){
                while ($cont < count($medicamentos)) {
                    $tratamiento = new Tratamiento();
                    $tratamiento->medicamento = $medicamentos[$cont];
                    $tratamiento->dosis = $dosis[$cont];
                    $tratamiento->cantidad_dias = $cantidad_dias[$cont];
                    $tratamiento->consulta_id = $consulta->id;
                    $tratamiento->save();


                    $cont = $cont + 1;
                }
            }

            DB::commit();

        } catch (QueryException $e) {

            DB::rollback();

        }

        return redirect('mascotas/'.$mascota_id.'/consultas');
    }

    public function show($mascota_id, $id)
    {
        $consulta = Consulta::findOrFail($id);
        if ($consulta->usuario_id == Auth::id() || Auth::user()->admin) {
            return view('vistas.consultas.show',
                [
                    'consulta' => $consulta,
                    'mascota_id' => $mascota_id,
                ]);
        }
    }

    public function edit($mascota_id, $id)
    {
        $consulta = Consulta::findOrFail($id);
        if ($consulta->usuario_id == Auth::id() || Auth::user()->admin) {
            return view('vistas.consultas.edit',
            [
                'consulta' => $consulta,
                'veterinarias' => Veterinaria::where('usuario_id', '=', Auth::id())->get(),
                'mascota_id' => $mascota_id,
                'tratamientos' => Tratamiento::where('consulta_id', '=', $id)->get(),
            ]);
        }

        return redirect('mascotas');
        
    }

    public function update($mascota_id, ConsultaFormRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $consulta = Consulta::findOrFail($id);
            $consulta->fecha_consulta = $request['fecha_consulta'];
            $consulta->motivo = $request['motivo'];
            $consulta->diagnostico = $request['diagnostico'];
            $consulta->fecha_control = $request['fecha_control'];
            $consulta->costo = $request['costo'];
            $consulta->veterinaria_id = $request['veterinaria_id'];
            $consulta->update();


            DB::table('tratamiento')->where('consulta_id', '=', $id)->delete();

            $medicamentos = $request->get('medicamentoT');
            $dosis = $request->get('dosisT');
            $cantidad_dias = $request->get('cantidad_diasT');
            $cont = 0;


            if ($medicamentos){
                while ($cont < count($medicamentos)) {
                    $tratamiento = new Tratamiento();
                    $tratamiento->medicamento = $medicamentos[$cont];
                    $tratamiento->dosis = $dosis[$cont];
                    $tratamiento->cantidad_dias = $cantidad_dias[$cont];
                    $tratamiento->consulta_id = $consulta->id;
                    $tratamiento->save();

                    $cont = $cont + 1;
                }

            }
            DB::commit();

        } catch (QueryException $e) {

            DB::rollback();

        }

        return redirect('mascotas/'.$mascota_id.'/consultas');
    }

    public function destroy($mascota_id, $id)
    {
        $consulta = Consulta::findOrFail($id);
        if ($consulta->usuario_id == Auth::id() || Auth::user()->admin) {
            $consulta->delete();

            return redirect('mascotas/'.$mascota_id.'/consultas');
        }

        return redirect('mascotas');

    }
}
