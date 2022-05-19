<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\ProdutoVenda;
use Illuminate\Support\Arr;
use App\Models\ProdutosPedidos;
use App\Models\PedidoVenda;
use Illuminate\Support\Facades\DB;
class CreatePedidoVenda extends Component
{
    public $clientes;
    public $cliente_id;
    public $produtosvenda;
    public $produtovenda_id;
    public $produtospedidos = [];
    public $pedido_id=null;
    public $total;

    public function mount(){
        $this->clientes =  User::where('grupo_id','=',1)
        ->where('empresa_id','=',Auth::user()->empresa_id)->get();
        $this->produtosvenda =  ProdutoVenda::where('empresa_id','=',Auth::user()->empresa_id)->get();
        if($this->clientes->count('id')>0){
        $this->cliente_id =$this->clientes[0]->id;
        }
        if($this->produtosvenda->count('product_sale_id')>0){
        $this->produtovenda_id =$this->produtosvenda[0]->product_sale_id;
        }
    }
    public function render()
    {


        return view('livewire.create-pedido-venda');
    }

    public function additem(){
        if($this->pedido_id ==null){
            if($this->produtovenda_id!=null){
                setlocale(LC_MONETARY,'pt_BR');

                    $pedido = new PedidoVenda;
                    $pedido->user_id = $this->cliente_id;
                    $pedido->empresa_id = Auth::user()->empresa_id;
                    $pedido->cupom_id = 0;
                    $pedido->save();
                    $this->pedido_id = $pedido->id;



            }

        }else{
            $produtopedido = ProdutosPedidos::where('pedido_id','=',$this->pedido_id)
            ->where('product_sale_id','=',$this->produtovenda_id)->get();

            if($produtopedido->count('pedido_id') == 0){

                $produtospedidos = new ProdutosPedidos;
                $produtospedidos->pedido_id = $this->pedido_id;
                $produtospedidos->empresa_id = Auth::user()->empresa_id;
                $produtospedidos->product_sale_id = $this->produtovenda_id;
                $produtospedidos->qtd = 1;
                $produto = ProdutoVenda::find($this->produtovenda_id);

                $produtospedidos->valor = $produto->product_sale_price;
                $produtospedidos->desconto = 0;
                $produtospedidos->save();
            }else{

                DB::table('pedidos_produtos')
                ->where('pedido_id', $this->pedido_id)
                ->where('product_sale_id', $this->produtovenda_id)
                ->update(['qtd' => $produtopedido[0]->qtd +1]);
                $this->produtospedidos = ProdutosPedidos::where('pedido_id','=',$this->pedido_id)
                    ->get();
            }
        }
    }
}
