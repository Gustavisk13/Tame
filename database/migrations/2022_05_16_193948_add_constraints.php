<?php

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

        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('id_departamento')->references('id')->on('departamentos')->onDelete('cascade');
        });
        Schema::table('departamentos', function (Blueprint $table) {
            $table->foreign('id_gerente')->references('id')->on('usuarios')->onDelete('cascade')->nullable();

        });
        Schema::table('categorias', function (Blueprint $table) {
            $table->foreign('categoria_pai')->references('id')->on('categorias')->nullable();

        });
        Schema::table('chamados', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->foreign('id_atendente')->references('id')->on('usuarios')->nullable();
            $table->foreign('id_departamento')->references('id')->on('departamentos')->nullable();
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('chamado_pai')->references('id')->on('chamados')->nullable();

        });
        Schema::table('tarefas', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->foreign('id_chamado')->references('id')->on('chamados');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorias', function (Blueprint $table) {
            //
        });
    }
};
