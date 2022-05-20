<?php

use App\Models\Departamentos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            //PRIMEIRO SE CRIA A COLUNA QUE IRÁ RECEBER A FOREING KEY DESEJADA
            $table->unsignedBigInteger('id_departamento')->nullable();
            //SE ADICIONA A CONSTRAINT NA COLUNA RECEM CRIADA
            $table->foreign('id_departamento')->nullable()->references('id')->on('departamentos');
            $table->string('nome', 128);
            $table->string('telefone', 16);
            $table->string('perfil', 2);
            $table->string('senha', 256);
            $table->string('email', 128)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
