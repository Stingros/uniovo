<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosNfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_nfs', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->float('valor', 8, 2);
            $table->float('qtd', 8, 2);
            $table->unsignedBigInteger('nfs_id');
            $table->unsignedBigInteger('produto_id');
            
            $table->foreign('produto_id')->references('id')->on('produtos');
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
        Schema::dropIfExists('produtos_nfs');
    }
}
