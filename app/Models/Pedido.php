<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
class Pedido extends Model
{
    use HasFactory;

    protected $table = 'sp_order';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
           
            'supply_name',
            'set_date',
            'order_type',            
            'prices',
            'installments',
    ];

    protected $casts = [
        'created_at'  => 'date:d/m/d',
        'updated_at' => 'date:d/m/y',
    ];
    public function produtoscompra()
    {
        return $this->belongsToMany(Produto::class, 'pedidos_produtos_compra', 'order_id', 'product_id')
        ->withPivot('qtd')
        ->withPivot('valor')
        ->withPivot('total')
        ->withPivot('desconto');
    }
}
