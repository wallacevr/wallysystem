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
}
