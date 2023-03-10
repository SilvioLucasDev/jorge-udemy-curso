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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); // cm, mm, kg
            $table->string('descricao', 30);
            $table->timestamps();
        });

        // Adiciona o relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');

            // Constraint
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // Adicionar o relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');

            // Constraint
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove o relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            // Remove a FK
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); // [tabela]_[coluna]_foreign

            // Remove a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        // Remove o relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            // Remove a FK
            $table->dropForeign('produtos_unidade_id_foreign'); // [tabela]_[coluna]_foreign

            // Remove a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
};
