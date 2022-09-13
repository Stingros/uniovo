<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nfs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chave_acesso', 150)->nullable();
            $table->string('numero', 34);
            $table->date('data_entrada',14);
            $table->date('data_emissao',10);
            $table->float('valor_total', 8, 2);
            $table->unsignedBigInteger('fornecedor_id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
            $table->string('complemento', 250)->nullable();
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
        Schema::dropIfExists('nfs');
    }
}
