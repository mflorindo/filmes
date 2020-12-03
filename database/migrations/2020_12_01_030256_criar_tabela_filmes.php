<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaFilmes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->bigInteger('id_diretor')->unsigned();
            $table->bigInteger('id_categoria')->unsigned();
            $table->smallInteger('duracao')->nullable();
            $table->timestamps();
            $table->foreign('id_diretor', 'fk_filmes_pessoas')->references('id')->on('pessoas');
            $table->foreign('id_catetoria', 'fk_filmes_categorias')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->dropForeign('fk_filmes_pessoas');
            $table->dropForeign('fk_filmes_categorias');
        });
        Schema::dropIfExists('filmes');
    }
}
