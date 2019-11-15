<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasHasEstudantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas_has_estudantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('turma_id')->foreign('turma_id')->references('turmas')->on('id');
            $table->unsignedInteger('estudante_id')->foreign('estudante_id')->references('estudantes')->on('id');
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
        Schema::dropIfExists('turmas_has_estudantes');
    }
}
