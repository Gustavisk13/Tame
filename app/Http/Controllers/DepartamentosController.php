<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamentos::all();
        return response()->json($departamentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newDept = new Departamentos([
            'id_gerente' => $request->get('id_gerente'),
            'nome' => $request->get('nome')
        ]);

        $newDept->save();

        return response()->json($newDept, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamentos = Departamentos::findOrFail($id);

        return response()->json($departamentos);
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
        $dept = Departamentos::findOrFail($id);

        $dept->id_gerente = $request->get('id_gerente');
        $dept->nome = $request->get('nome');

        $dept->save();

        return response()->json($dept,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamentos $departamentos)
    {
        //
    }
}
