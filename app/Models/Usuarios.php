<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'perfil',
        'telefone',
        'id_departamento'
    ];

    //PARA RELACIONAR DEVE-SE PRIMEIRO CRIAR UM METODO DE RELACIONAMENTO

    //METODO DEVE SER NOMEADO PELA MANEIRA QUE VC VAI ACESSAR O RELAIONAMENTO, QUANDO USUARIO PRECISA ACESSAR
    //CHAMADOS DEVE SE CHAMAR CHAMADO

    //TAMBEM E POSSIVEL RELACIONAR DE MANEIRA INVERSA, COMO NO CASO DE UM CHAMADO POSSUIR UM USUARIO VA PARA LINHA
    //14 DA MODEL CHAMADOS


    public function chamados()
    {
        //O METODO PRECISA RETORNAR ALGUMA FORMA DE RELACIONAMENTO
        //PRIMEIRO PARAMETRO SE PASSA A MODEL QUE SERA RELACIONADA

        return $this->hasMany(Chamados::class);
    }

    public function atendente()
    {
        return $this->hasOne(Chamados::class);
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefas::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamentos::class);
    }
    public function gerente()
    {
        return $this->hasOne(Departamentos::class);
    }

}
