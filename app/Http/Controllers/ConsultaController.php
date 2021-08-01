<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function index($mascota_id)
    {
        return view('vistas.consultas.index',
            [
                'consultas' => Consulta::where('mascota_id', '=', $mascota_id)->get()
            ]);
    }

    public function create()
    {
        return view('vistas.consultas.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $consulta = new Consulta();
            $consulta->fecha_consulta = $request['fecha_consulta'];
            $consulta->sintomas = $request['sintomas'];
            $consulta->diagnostico = $request['diagnostico'];
            $consulta->fecha_control = $request['fecha_control'];
            $consulta->veterinaria_id = $request['veterinaria_id'];
            $consulta->mascota_id = $request['mascota_id'];
            $consulta->save();


            $medicamentos = $request->get('medicamentoT');
            $dosis = $request->get('dosisT');
            $cantidad_dias = $request->get('cantidad_diasT');
            $presentaciones = $request->get('presentacionT');
            $cont = 0;


            while ($cont < count($medicamentos)) {
                $tratamiento = new Tratamiento();
                $tratamiento->medicamento = $medicamentos[$cont];
                $tratamiento->dosis = $dosis[$cont];
                $tratamiento->cantidad_dias = $cantidad_dias[$cont];
                $tratamiento->presentacion = $presentaciones[$cont];
                $tratamiento->consulta_id = $consulta->id;

                $tratamiento->save();


                $cont = $cont + 1;
            }

            DB::commit();

        } catch (QueryException $e) {

            DB::rollback();

        }

        return redirect('consultas');
    }

    public function show($id)
    {
        return view('vistas.consultas.show', ['consulta' => Consulta::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('vistas.consultas.edit',
            [
                'consulta' => Consulta::findOrFail($id),
                'tratamientos' => Tratamiento::where('consulta_id', '=', $id)->get(),
            ]);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $consulta = new Consulta();
            $consulta->fecha_consulta = $request['fecha_consulta'];
            $consulta->sintomas = $request['sintomas'];
            $consulta->diagnostico = $request['diagnostico'];
            $consulta->fecha_control = $request['fecha_control'];
            $consulta->veterinaria_id = $request['veterinaria_id'];
            $consulta->mascota_id = $request['mascota_id'];
            $consulta->update();


            DB::table('tratamiento')->where('consulta_id', '=', $id)->delete();

            $medicamentos = $request->get('medicamentoT');
            $dosis = $request->get('dosisT');
            $cantidad_dias = $request->get('cantidad_diasT');
            $presentaciones = $request->get('presentacionT');
            $cont = 0;


            while ($cont < count($medicamentos)) {
                $tratamiento = new Tratamiento();
                $tratamiento->medicamento = $medicamentos[$cont];
                $tratamiento->dosis = $dosis[$cont];
                $tratamiento->cantidad_dias = $cantidad_dias[$cont];
                $tratamiento->presentacion = $presentaciones[$cont];
                $tratamiento->consulta_id = $consulta->id;

                $tratamiento->save();


                $cont = $cont + 1;
            }

            DB::commit();

        } catch (QueryException $e) {

            DB::rollback();

        }

        return redirect('consultas');
    }

    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return redirect('consulta');
    }
}