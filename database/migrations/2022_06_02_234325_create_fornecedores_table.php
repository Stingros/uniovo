<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 100);
            $table->string('razao_social', 100)->nullable();
            $table->string('cnpj',14)->nullable();
            $table->string('inscricao_estadual',10)->nullable();
            $table->string('nome_contato', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('fone',11)->nullable();
            $table->integer('cities_id')->unsigned()->nullable();
            $table->foreign('cities_id')->references('id')->on('cities');
            $table->string('bairro', 100)->nullable();
            $table->string('logradouro', 100)->nullable();
            $table->string('numero',10)->nullable();
            $table->string('complemento', 100)->nullable();
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
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropForeign('fornecedores_cities_id_foreign');
            $table->dropColumn('cities_id');
        });
        Schema::dropIfExists('fornecedores');
    }
}
