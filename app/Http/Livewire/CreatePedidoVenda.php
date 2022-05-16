<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class CreatePedidoVenda extends Component
{
    public $clientes;
    public $cliente_id;
    public function render()
    {
        $this->clientes =  User::where('grupo_id','=',1)->get();
      
        return view('livewire.create-pedido-venda');
    }
}
