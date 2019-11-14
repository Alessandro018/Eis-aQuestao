<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('disciplina_id')->foreign('disciplina_id')->references('disciplinas')->on('id');
            $table->unsignedInteger('estudante_id')->foreign('estudante_id')->references('estudantes')->on('id');
            $table->unsignedInteger('periodo_letivo_id')->foreign('periodo_letivo_id')->references('periodos_letivos')->on('id');
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
        Schema::dropIfExists('turmas');
    }
}
