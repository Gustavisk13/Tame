<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuarios;
use App\Models\Departamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    function checkLogin(Request $request)
    {

        $email = $request->get('email');
        try {
            $user = Usuarios::where('email', $email)->first();
        } catch (\Throwable $th) {
            return "false";
        }
        $senha = $user->senha;
        if($senha === $request->get('senha'))
            //return view('home');
            $depto = null;
            try {
                $depto = Departamentos::where('id', $user->id_departamento)->first();
            } catch (\Throwable $th) {
                //throw $th;
            }
            if($depto == null){
                return "{
                    \"redirect\": \"home\",
                    \"nome\": \"$user->nome\",
                    \"departamento\": \"null\"
                    }";
            }else{
                return "{
                    \"redirect\": \"home\",
                    \"nome\": \"$user->nome\",
                    \"departamento\": \"$depto->nome\"
                    }";
            }
            return "false";


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::query()->orderBy('id', 'desc')->get();
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
            'nome' => $request->get('name'),
            'telefone' => $request->get('phone'),
            'perfil' => $request->get('profile'),
            'senha' => $request->get('password'),
            'email' => $request->get('email'),
            'id_departamento' => $request->get('department')
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

        $user->nome = $request->get('name');
        $user->telefone = $request->get('phone');
        $user->perfil = $request->get('profile');
        $user->senha = $request->get('password');
        $user->email = $request->get('email');
        $user->id_departamento = $request->get('department');


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
