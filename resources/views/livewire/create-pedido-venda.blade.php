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

                <select name="produtosvenda" id="produtosvenda"  wire:model="produtovenda_id" class="form-control">

                    @foreach($produtosvenda as $produtosvenda)

                        <option value="{{ $produtosvenda->product_sale_id }}">{{ $produtosvenda->product_sale_name }}</option>

                    @endforeach
                    </select>
            </div>
            <div class="col">

                <button class="btn btn-primary"  wire:click="additem">+</button>
            </div>
        </div>
        <table id="example" class="table table-striped table-bordered " style="width: 100%;">

        <thead>
			<tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >ID</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Produto</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Qtd</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Valor</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Desconto</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Acao</th>
            </tr>
		</thead>

		<tbody>
                 <!--    -->
    		@foreach ($produtospedidos as $produto)
                <tr role="row" class="odd">


                    <td class="sorting_1">{{ $produto->product_sale_id }}</td>
                    <td></td>
                    <td>{{ $produto->qtd }}</td>
                    <td>{{ $produto->valor }}</td>

                    <td>R$ {{ number_format($produto->deesconto,2,",",".") }}</td>
                    <td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </div>
