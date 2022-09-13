<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 150);
            $table->string('codigo', 10)->nullable();
            $table->integer('estoque_min');
            $table->integer('estoque_max');
            $table->string('detalhe', 250)->nullable();
          
            $table->unsignedBigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias_produtos');

            $table->unsignedBigInteger('unidade_medida_id')->unsigned();
            $table->foreign('unidade_medida_id')->references('id')->on('unidades_medidas');

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
        Schema::dropIfExists('produtos');
    }
}
