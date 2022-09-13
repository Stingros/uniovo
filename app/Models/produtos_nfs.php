<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtos_nfs extends Model
{
    use HasFactory;
    protected $table = 'produtos_nfs';
    protected $fillable = [
        'qtd',
        'valor',
        'nfs_id',
        'produto_id',
    ];
}
 