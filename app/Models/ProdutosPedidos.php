<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutosPedidos extends Model
{
    use HasFactory;
    protected $table = 'pedidos_produtos';
    protected $fillable = [
        'empresa_id',
        'pedido_id',
        'produc_sale_id',
        'qtd',
        'valor',
        'desconto'

    ];
}
      
