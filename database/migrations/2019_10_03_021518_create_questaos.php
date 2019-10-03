<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('pergunta');
            $table->string('tipo');
            $table->integer('nivel');
            $table->unsignedInteger('professor_id')->foreign('professor_id')->references('id')->on('professor');
            $table->unsignedInteger('disciplina_id')->foreign('disciplina_id')->references('id')->on('disciplina');
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
        Schema::dropIfExists('questaos');
    }
}
