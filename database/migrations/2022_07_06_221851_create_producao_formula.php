<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducaoFormula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producao_formula', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_producao');
            $table->integer('qtd_batida');
           
          
            $table->unsignedBigInteger('formula_id')->unsigned();
            $table->foreign('formula_id')->references('id')->on('formulas');

            $table->unsignedBigInteger('departamento_id')->unsigned()->nullable();
            $table->foreign('departamento_id')->references('id')->on('departamento');

            
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
        Schema::dropIfExists('producao_formula');
    }
}
