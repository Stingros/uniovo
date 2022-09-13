<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formulas_produtos extends Model
{
    use HasFactory;
    protected $table = 'formulas_produtos';
    protected $fillable = [
        'produto_id',
        'formula_id',
        'qtd_produto',
    ];
}
