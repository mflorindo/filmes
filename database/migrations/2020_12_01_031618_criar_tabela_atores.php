<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaAtores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atores', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('id_pessoa');
            $table->bigInteger('id_filme');
            $table->string('nome_personagem', 100);
            $table->boolean('is_ator_principal')->default(false);
            $table->timestamps();

            $table->foreign('id_pessoa', 'fk_atores_pessoas')->references('id')->on('pessoas')->onDelete('cascade');
            $table->foreign('id_filme', 'fk_filmes_pessoas')->references('id')->on('filmes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atores', function (Blueprint $table) {
            $table->dropForeign('fk_atores_pessoas');
            $table->dropForeign('fk_filmes_pessoas');
        });
        Schema::dropIfExists('atores');
    }
}
