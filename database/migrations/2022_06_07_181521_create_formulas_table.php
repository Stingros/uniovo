<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo', 10);
            $table->string('descricao', 150);
            $table->integer('rendimento_batida');
            $table->date('data_vigor');
            $table->string('observacoes', 250)->nullable();
          
            $table->unsignedBigInteger('fase_criacao_id')->unsigned();
            $table->foreign('fase_criacao_id')->references('id')->on('fase_criacoes');

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
        Schema::dropIfExists('formulas');
    }
}
