<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    use HasFactory;

    public function departamento()
    {
        return $this->hasMany(Usuarios::class);
    }
    public function chamados()
    {
        return $this->hasMany(Chamados::class);
    }

    public function gerente()
    {
        return $this->belongsTo(Usuarios::class);
    }
}
