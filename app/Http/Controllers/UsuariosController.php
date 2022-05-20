<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        return response()->json($usuarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newUser = new Usuarios([
            'nome' => $request->get('nome'),
            'telefone' => $request->get('telefone'),
            'perfil' => $request->get('perfil'),
            'senha' => $request->get('senha'),
            'email' => $request->get('email'),
            'id_departamento' => $request->get('id_departamento')
          ]);

          $newUser->save();

          return response()->json($newUser, 201);

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {

        $user = Usuarios::findOrFail($id);

        return response()->json($user);
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

        $user = Usuarios::findOrFail($id);

        $user->nome = $request->get('nome');
        $user->telefone = $request->get('telefone');
        $user->perfil = $request->get('perfil');
        $user->senha = $request->get('senha');
        $user->email = $request->get('email');
        $user->id_departamento = $request->get('id_departamento');


        $user->save();

        return response()->json($user,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }
}
