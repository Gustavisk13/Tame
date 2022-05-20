<?php

namespace App\Http\Controllers;

use App\Models\Tarefas;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarefas = Tarefas::all();
        return response()->json($tarefas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTarefa = new Tarefas([
            'id_usuario' => $request->get('id_usuario'),
            'id_chamado' => $request->get('id_chamado'),
            'tipo' => $request->get('tipo'),
            'descricao' => $request->get('descricao'),
            'tempo' => $request->get('tempo')
        ]);

        $newTarefa->save();

        return response()->json($newTarefa, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarefa = Tarefas::findOrFail($id);

        return response()->json($tarefa);
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
        $tarefa = Tarefas::findOrFail($id);

        $tarefa->id_usuario = $request->get('id_usuario');
        $tarefa->id_chamado = $request->get('id_chamado');
        $tarefa->tipo = $request->get('tipo');
        $tarefa->descricao = $request->get('descricao');
        $tarefa->tempo = $request->get('tempo');

        $tarefa->save();

        return response()->json($tarefa,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefas $tarefas)
    {
        //
    }
}
