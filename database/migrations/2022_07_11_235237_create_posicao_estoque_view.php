<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePosicaoEstoqueView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CASO NÃO SEJA EXECUTADO PELO LARAVEL, EXECUTAR MANUALMENTE NO DB CASO CONTRARIO DARÁ PROBLEMA NA TELA DE POSIÇÃO DE ESTOQUE
        DB::statement("DELIMITER $$
        CREATE PROCEDURE posicao_estoque_sp(in dt_inicial date, in dt_final date)
        BEGIN
         DELETE FROM posicao_estoque;
         INSERT INTO posicao_estoque(codigo, nome, saldo_inicial, entradas, saidas, saldo_final)
             select
                 p.id,
                p.nome,
                SUM(if(t.nome = 'ENTRADA' and e.data_operacao < dt_inicial, e.quantidade,0)) - sum(if(t.nome = 'SAIDA' and e.data_operacao < dt_final, e.quantidade,0)) saldo_inicial,
                SUM(if(t.nome = 'ENTRADA' and e.data_operacao BETWEEN dt_inicial AND dt_final, e.quantidade,0)) entradas,
                SUM(if(t.nome = 'SAIDA' and e.data_operacao BETWEEN dt_inicial AND dt_final, e.quantidade,0)) saidas,
                SUM(if(t.nome = 'ENTRADA', e.quantidade,0)) - SUM(if(t.nome = 'SAIDA', e.quantidade,0)) saldo_final
             from entradas_saidas e
             inner join produtos p on p.id = e.produto_id
             inner join tipo_operacoes t on t.id = e.tipo_operacao_id
             where e.data_operacao <= dt_final
             group by 1;
        END $$
        DELIMITER ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS posicao_estoque");
    }
}
