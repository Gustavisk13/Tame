<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamados extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_atendente',
        'id_categoria',
        'id_chamado_pai',
        'id_departamento',
        'titulo',
        'descricao',
        'impacto',
        'status'
    ];

    //FK_ID_USUARIO
    public function usuario()
    {
        //AQUI O RELACIONAMENTO DIZ QUE UM CHAMADO PERTENCE A UM USUARIO
        return $this->belongsTo(Usuarios::class);
    }
    //FK_ID_USUARIO(ATENDENTE)
    public function atendente()
    {
        return $this->belongsTo(Usuarios::class, 'id_atendente');
    }
    //FK_ID_CATEGORIA
    public function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }
    //FK_ID_CHAMADO(CHAMADO PAI)
    public function chamadoPai()
    {
        return $this->belongsTo(Chamados::class);
    }
    //FK_ID_DEPARTAMENTOS
    public function departamentos()
    {
        return $this->belongsTo(Departamentos::class);
    }
}
