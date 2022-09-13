<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasSaidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas_saidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_operacao');
            $table->float('valor_unitario', 8, 2)->nullable();
            $table->integer('quantidade');
           
          
            $table->unsignedBigInteger('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');

            $table->unsignedBigInteger('tipo_operacao_id')->unsigned();
            $table->foreign('tipo_operacao_id')->references('id')->on('tipo_operacoes');
           
            $table->unsignedBigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('cms_users');

            $table->unsignedBigInteger('departamento_id')->unsigned()->nullable();
            $table->foreign('departamento_id')->references('id')->on('departamento');

            $table->unsignedBigInteger('nfs_id')->unsigned()->nullable();
            $table->foreign('nfs_id')->references('id')->on('nfs');

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
        Schema::dropIfExists('entrada_saida');
    }
}
