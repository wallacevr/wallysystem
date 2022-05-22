<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoVenda extends Model
{
    use HasFactory;

    protected $table = 'pedidos_venda';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [

            'empresa_id',
            'user_id',
            'cupom_id',
    ];

    public function produtosvenda()
    {
        return $this->belongsToMany(ProdutoVenda::class, 'pedidos_produtos', 'pedido_id', 'product_sale_id')
        ->withPivot('qtd')
        ->withPivot('valor')
        ->withPivot('desconto');
    }
}
