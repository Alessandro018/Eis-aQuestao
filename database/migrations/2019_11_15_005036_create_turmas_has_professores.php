<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasHasProfessores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas_has_professores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('turma_id')->foreign('turma_id')->references('turmas')->on('id');
            $table->unsignedInteger('professor_id')->foreign('professor_id')->references('professores')->on('id');
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
        Schema::dropIfExists('turmas_has_professores');
    }
}
