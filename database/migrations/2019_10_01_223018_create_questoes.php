<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pergunta', 2000);
            $table->string('tipo');
            $table->integer('nivel');
            $table->unsignedInteger('professor_id')->foreign('professor_id')->references('id')->on('professores');
            $table->unsignedInteger('disciplina_id')->foreign('disciplina_id')->references('id')->on('disciplinas');
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
        Schema::dropIfExists('questoes');
    }
}
