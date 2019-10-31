<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvasGerada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova_geradas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('prova_id')->foreign('prova_id')->references('id')->on('provas');
            $table->unsignedInteger('estudante_id')->foreign('estudante_id')->references('id')->on('estudantes');
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
        Schema::dropIfExists('prova_geradas');
    }
}
