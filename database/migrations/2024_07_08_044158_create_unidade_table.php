<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        //relacionamento com tabela produtos
        Schema::table('produtos', function(Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
        //relacionamento com tabela produtos_detalhes 
        Schema::table('produtos_detalhes', function(Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remover o relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) {
            //remove a chave estrangeira
            $table->dropForeign('produto_detalhes_unidade_id_foregin');
            //remove a coluna unidade_id
            $table->dropColumn('unidade_id');

            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //remover o relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table) {
            //remove a chave estrangeira
            $table->dropForeign('produtos_unidade_id_foregin');
            //remove a coluna unidade_id
            $table->dropColumn('unidade_id');

            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        Schema::dropIfExists('unidade');
    }
};
