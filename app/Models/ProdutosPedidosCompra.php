<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\ProdutosPedidosCompra;
class ProdutosPedidosCompra extends Model
{
    use HasFactory;
    protected $table = 'pedidos_produtos_compra';
    protected $fillable = [
        'empresa_id',
        'order_id',
        'product_id',
        'qtd',
        'valor',
        'desconto'

    ];

    protected $casts = [
        'created_at'  => 'date:d/m/d',
        'updated_at' => 'date:d/m/y',
    ];
    public function produtoscompra()
    {
        return $this->belongsToMany(ProdutosPedidosCompra::class, 'pedidos_produtos_compra', 'order_id', 'prod_id')
        ->withPivot('qtd')
        ->withPivot('valor')
        ->withPivot('total')
        ->withPivot('desconto');
    }
}
      
