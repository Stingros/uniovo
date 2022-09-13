<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entradas_saidas extends Model
{
    use HasFactory;
    protected $table = 'entradas_saidas';
    protected $fillable = [
        'data_operacao',
        'valor_unitario',
        'quantidade',
        'produto_id',
        'tipo_operacao_id',
        'usuario_id',
        'departamento_id',
        'nfs_id',
    ];
}
