<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_chamado',
        'tipo',
        'descricao',
        'tempo'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class);
    }

    public function chamado()
    {
        return $this->belongsTo(Chamados::class);
    }
}
