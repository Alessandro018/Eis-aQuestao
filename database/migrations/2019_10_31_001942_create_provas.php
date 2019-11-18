<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('turma_id')->foreign('turma_id')->references('id')->on('turmas');
            $table->Integer('questoes_nivel_1');
            $table->Integer('questoes_nivel_2');
            $table->Integer('questoes_nivel_3');
            $table->string('cabecalho', 255);
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
        Schema::dropIfExists('provas');
    }
}
