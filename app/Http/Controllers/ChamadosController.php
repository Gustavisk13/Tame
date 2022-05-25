<?php

namespace App\Http\Controllers;

use App\Models\Chamados;
use Illuminate\Http\Request;

class ChamadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chamados = Chamados::all();
        return response()->json($chamados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newChamado = new Chamados([
            'id_usuario' => $request->get('id_usuario'),
            'id_atendente' => $request->get('id_atendente'),
            'id_categoria' => $request->get('id_categoria'),
            'id_chamado_pai' => $request->get('id_chamado_pai'),
            'id_departamento' => $request->get('id_departamento'),
            'titulo' => $request->get('titulo'),
            'descricao' => $request->get('descricao'),
            'impacto' => $request->get('impacto'),
            'status' => $request->get('status')
          ]);

          $newChamado->save();

          return response()->json($newChamado, 201);

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {

        $chamado = Chamados::findOrFail($id);

        return response()->json($chamado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $chamado = Chamados::findOrFail($id);

        $chamado->id_usuario = $request->get('id_usuario');
        $chamado->id_atendente = $request->get('id_atendente');
        $chamado->id_categoria = $request->get('id_categoria');
        $chamado->id_chamado_pai = $request->get('id_chamado_pai');
        $chamado->id_departamento = $request->get('id_departamento');
        $chamado->titulo = $request->get('titulo');
        $chamado->descricao = $request->get('descricao');
        $chamado->impacto = $request->get('impacto');

        $chamado->status = $request->get('status');


        $chamado->save();

        return response()->json($chamado,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chamados  $chamados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chamados $chamados)
    {
        //
    }
}
