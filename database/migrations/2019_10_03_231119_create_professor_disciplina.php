<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorDisciplina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_disciplina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('disciplina_id')->foreign('disciplina_id')->references('id')->on('disciplina');
            $table->unsignedInteger('professor_id')->foreign('professor_id')->references('id')->on('professor');
            $table->unsignedInteger('periodo_letivo_id')->foreign('periodo_letivo_id')->references('id')->on('periodo_letivo');
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
        Schema::dropIfExists('professor_disciplina');
    }
}
