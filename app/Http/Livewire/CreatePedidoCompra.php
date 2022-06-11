<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Endereco;
use App\Models\Estado;
use App\Models\Pedido;
use App\Models\ProdutosPedidosCompra;
use App\Models\City;
use App\Services\ViacepService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
class CreatePedidoCompra extends Component
{
    public $tipo_end = 3;
    public $cel;
    public $cep;
    public $endereco ;
    public $num;
    public $complemento;
    public $bairro;
    public $uf;
    public $cidade;
    public $pais;
    public $addend = 0;
    public $inputCep;
    public $data;
    public $nome;
    public $city_id;
    public $state_id;
    public $enderecos;
    public $pedido_id;
    public $produtocompra_id;
    public $supplier_id;
    public $order_id;
    public $valor;

    protected $rules = [
        'inputCep' => 'required',
    ];
  
    public function render()
    {
        return view('livewire.create-pedido-compra');
    }
    public function mount(){
        $this->enderecos = Endereco::where('empresa_id','=',Auth::user()->empresa_id)->orderBy('nome')->get();
        $this->fornecedores =  Fornecedor::where('empresa_id','=',Auth::user()->empresa_id)->orderBy('name')->get();
        $this->produtos =  Produto::where('empresa_id','=',Auth::user()->empresa_id)->orderBy('prod_name')->get();
        if($this->fornecedores->count('id')>0){
             $this->supplier_id =$this->fornecedores[0]->id;
        }

        if($this->produtos->count('prod_name')>0){
              $this->produto_id =$this->produtos[0]->id;
        }
    }

    public function salvarendereco(){
        $endereco = new Endereco;
        $endereco->nome    =  $this->nome;
        $endereco->cel    =  $this->cel;
        $endereco->endereco    =  $this->endereco;
        $endereco->num    =  $this->num;
        $endereco->complemento    =  $this->complemento;
        $endereco->bairro    =  $this->bairro; 
        $endereco->city_id = $this->city_id;
        $endereco->state_id = $this->state_id;
        $endereco->cep = $this->inputCep;
        $endereco->pais = "Brasil";
        $endereco->empresa_id = Auth::user()->empresa_id;
        $endereco->tipo_end = 3;
        $endereco->save();    
        $this->addend = 0;
        $this->enderecos = Endereco::where('empresa_id','=',Auth::user()->empresa_id)->orderBy('nome')->get();
    }
    public function cancelar(){
      
       $this->nome ="";
       $this->cel ="";
       $this->endereco ="";
        $this->num ="";
       $this->complemento ="";
       $this->bairro =""; 
       $this->city_id ="";
       $this->state_id ="";
       $this->inputCep ="";  
        $this->addend = 0;
        $this->enderecos = Endereco::where('empresa_id','=',Auth::user()->empresa_id)->orderBy('nome')->get();
    }
    public function addendereco(){
       $this->addend = 1 ;
     }

    public function preencheendereco(){
        $response = Http::get("http://viacep.com.br/ws/{$this->inputCep}/json/");
     
        $dados = $response->json();
        
        
       
        if (is_null($dados)) {
            $this->addError('save', 'CEP não encontrado');
        }else{
            $this->endereco = $dados['logradouro'];
            $this->bairro = $dados['bairro'];
            $this->cidade = $dados['localidade'];
            $this->uf = $dados['uf'];
            $cidade = City::where('ibge_code','=',$dados['ibge'])->get();
            $this->city_id = $cidade[0]->id;
            $this->state_id = $cidade[0]->state_id;
        }
       
    }  

    public function additens(){
      
        try {
           // dd($this);
            if($this->order_id==null && $this->produtocompra_id!=null){
                
                setlocale(LC_MONETARY,'pt_BR');
               
                    $pedido = new Pedido;
                    
                    $pedido->supplier_id = $this->supplier_id;
                    $pedido->empresa_id = Auth::user()->empresa_id;
                   
                    $pedido->desconto = 0;
                    $pedido->frete = 0;
                    $pedido->total = 0;
                    $pedido->save();
                    $this->order_id = $pedido->id;
                   
            }elseif($this->order_id != null  && $this->produtocompra_id!=null){
                $ped=ProdutosPedidosCompra::where('order_id','=',$this->order_id)->get();
                $pedido = ProdutosPedidosCompra::find($ped[0]->id);
                $pedido->order_id = $this->order_id;
                $pedido->empresa_id = Auth::user()->empresa_id;
                $pedido->save();
                $this->pedido_id = $pedido->id;
                
            }
           
            if($this->order_id !=null  && $this->produtocompra_id!=null){

               
                $produtopedido = ProdutosPedidosCompra::where('order_id','=',$this->order_id)
                ->where('product_id','=',$this->produtocompra_id)->get();
                
                if($produtopedido->count('pedido_id') == 0){

                    $produtospedidos = new ProdutosPedidosCompra;
                    $produtospedidos->order_id = $this->order_id;
                    $produtospedidos->empresa_id = Auth::user()->empresa_id;
                    $produtospedidos->product_id = $this->produtocompra_id;
                    $produtospedidos->qtd = 1;
                    

                    $produtospedidos->valor = $this->valor;
                    $produtospedidos->desconto = 0;
                    $produtospedidos->save();
                }else{

                    DB::table('pedidos_produtos_compra')
                    ->where('order_id', $this->order_id)
                    ->where('product_id', $this->produtocompra_id)
                    ->update(['qtd' => $produtopedido[0]->qtd +1]);

                }
            }
            $this->pedido  = Pedido::where('id','=',$this->order_id)->with('produtoscompra')->get();
         
         //   $this->produtospedidos = ProdutosPedidos::where('pedido_id','=',$this->pedido_id)
           //             ->get();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }


}
