<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\ProdutoVenda;
class CreatePedidoVenda extends Component
{
    public $clientes;
    public $cliente_id;
    public $produtosvenda;
    public $produtovenda_id;
    public function render()
    {
        $this->clientes =  User::where('grupo_id','=',1)
                               -> where('empresa_id','=',Auth::user()->empresa_id)->get();
        $this->produtosvenda =  ProdutoVenda::where('empresa_id','=',Auth::user()->empresa_id)->get();
        return view('livewire.create-pedido-venda');
    }
}
