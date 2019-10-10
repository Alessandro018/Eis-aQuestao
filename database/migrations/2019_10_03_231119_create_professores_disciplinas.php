<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessoresDisciplinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professores_disciplinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('disciplina_id')->foreign('disciplina_id')->references('id')->on('disciplinas');
            $table->unsignedInteger('professor_id')->foreign('professor_id')->references('id')->on('professores');
            $table->unsignedInteger('periodo_letivo_id')->foreign('periodo_letivo_id')->references('id')->on('periodos_letivos');
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
        Schema::dropIfExists('professores_disciplinas');
    }
}
