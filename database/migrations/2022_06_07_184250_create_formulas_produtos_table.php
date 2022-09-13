<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulasProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulas_produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->float('qtd_produto', 8, 2);
            $table->unsignedBigInteger('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');

            $table->unsignedBigInteger('formula_id')->unsigned();
            $table->foreign('formula_id')->references('id')->on('formulas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulas_produtos');
    }
}
