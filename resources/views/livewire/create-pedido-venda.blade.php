<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row my-5">
        <h1 class="text-center">Cadastro de Pedido de Venda</h1>
    </div>
    <div class="row">
         <div class="col">

             <select name="clientes" id="clientes"  wire:model="cliente_id" class="form-control">

                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>

                    @endforeach
             </select>

         </div>
         <div class="col">

            <select name="produtosvenda" id="produtosvenda"  wire:model="produtosvenda_id" class="form-control">

                @foreach($produtosvenda as $produtosvenda)
                    <option value="{{ $produtosvenda->id }}">{{ $produtosvenda->product_sale_name }}</option>

                @endforeach
            </select>
        </div>
    </div>
</div>
