<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'id_categoria_pai'
    ];

    public function chamados()
    {
        return $this->hasMany(Chamados::class);
    }
    public function categoriaPai()
    {
        return $this->belongsTo(Categorias::class);
    }
}
