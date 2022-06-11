<div>
    {{-- Do your work, then step back. --}}
    @section('bootstrap')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    @endsection
    <div class="row">
            <div class="col-md-6">
                <label for="inputFornecedor" class="form-label text-white">Fornecedor</label>
                <select id="inputFornecedor" class="form-control form-select" name="state">
                <option selected=""></option>
            
                    @foreach( $fornecedores as $fornecedor ) 
                        <option value="{{ $fornecedor->id }}">{{ $fornecedor->name }} </option>
                    @endforeach	
        
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label text-white">Data:</label>
                <input type="date" class="form-control"> 
            </div>

            <div class="col-md-6">
                <label for="inputprevEnt" class="form-label text-white">Previsao de Entrega:</label>
                <input type="date" class="form-control"> 
            </div>
            <div class="col-md-3">
                <label for="inputparcelas" class="form-label text-white">Nº de parcelas</label>
                <select id="inputparcelas" class="form-select form-control" name="state">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="inputVenc" class="form-label text-white">Vencimento 1ª Parcela:</label>
                <input type="date" class="form-control"> 
            </div>
            
            @if($addend)
            <div class="col-md-3 my-2 py-4">
                <button type="button" wire:click="salvarendereco" class="btnaddendereco btn default">
                    <i class='bx bx-plus-circle'></i>Salvar endereço
                </button>
                <button type="button" wire:click="cancelar" class="btnaddendereco btn default">
                   Cancelar
                </button>
                </div>
                <div class="col-md-9 my-2 justify-content-center align-items-center mt-2">
                        <label class="text-white" for="nomeend" wire:model="nome">Nome:</label>

                        <input wire:model="nome" data-toggle="tooltip" data-placement="top" title="Digite o seu Nome" id="nomeend" class="form-control w-25" type="text" name="nome" :value="old('nome')"    required autofocus auto-complete="false" />
                </div>
            @else
 
                <div class="col-md-3">
                <label for="inputEndFat" class="form-label text-white">Endereço de Faturamento</label>
                <select id="inputEndFat" class="form-select form-control" name="state">
                    @foreach($enderecos as $endereco)
                        <option value="{{$endereco->id}}">{{$endereco->nome}}</option>
                    @endforeach
                
                </select>
            </div>
            <div class="col-md-3">
                <label for="inputEndEnt" class="form-label text-white">Endereço de Entrega</label>
                <select id="inputEndEnt" class="form-select form-control" name="state">
                    @foreach($enderecos as $endereco)
                        <option value="{{$endereco->id}}">{{$endereco->nome}}</option>
                    @endforeach
                
                </select>
            </div>
            <div class="col-md-3 my-3 py-4">
                    <button type="button" wire:click="addendereco" class="btnaddendereco btn default" data-toggle="modal" data-target="#modalExemplo">
                        <i class='bx bx-plus-circle'></i>Adicionar endereço
                    </button>
                </div>
             @endif   

            @if($addend)
                     <div class="col-3 justify-content-center align-items-center mx-auto mt-2">
                        <label class="text-white" for="cel" >Cel:</label>

                        <input wire:model="cel" data-toggle="tooltip" data-placement="top" title="Digite o seu Celular" id="cel" class="form-control" type="tel" name="cel" :value="old('cel')"  pattern="(\([0-9]{2}\))([9]{1})?([0-9]{4})-([0-9]{4})"  required autofocus auto-complete="false" />
                    </div>
                    <div class="col-3 justify-content-center align-items-center mx-auto mt-2">
                        <label class="text-white" for="cep">CEP:</label>

                        <input wire:blur="preencheendereco" wire:model="inputCep" data-toggle="tooltip" data-placement="top" title="Digite o seu CEP" id="cepz" class="form-control" type="text" name="cep" :value="old('cep')" required autofocus auto-complete="false" />
                    </div>
                    <div class="col-3" id="erroCEP" style="display: none">
                        <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> CEP não encontrado/inválido</p>
                    </div>

                    <div class="col-3 justify-content-center align-items-center mx-auto mt-2">
                        <label class="text-white" for="endereco">Endereço:</label>

                        <input wire:model="endereco" data-toggle="tooltip" data-placement="top" title="Digite o Endereço" id="enderecox" class="form-control" type="text" name="enderecox" :value="old('enderecox')" required autofocus/>
                    </div>

                    <div class="col-3 justify-content-center align-items-center mx-auto mt-2">
                        <label class="text-white" for="num">Nº:</label>

                        <input wire:model="num" data-toggle="tooltip" data-placement="top" title="Digite o número da residência" id="numero_endereco" class="form-control" type="text" name="numero_endereco" :value="old('numero_endereco')" required autofocus/>
                    </div>

                    <div class="col-3 justify-content-center align-items-center mx-auto mt-2">
                        <label class="text-white" for="complemento">Compl.:</label>

                        <input  wire:model="complemento" data-toggle="tooltip" data-placement="top" title="Digite o complemento da residência" id="complemento_endereco" class="form-control" type="text" name="complemento_endereco" :value="old('complemento_endereco')" required autofocus/>
                    </div>

                    <div class="col-3 justify-content-center align-items-center mx-auto mt-2">
                        <label class="text-white" for="bairro">Bairro:</label>

                        <input  wire:model="bairro" data-toggle="tooltip" data-placement="top" title="Digite o Bairro" id="bairro" class="form-control" type="text" name="bairro" :value="old('bairro')" required autofocus/>
                    </div>

                    <div class="col-3 justify-content-center align-items-center mx-auto mt-2">
                        <label class="text-white" for="cidade">Cidade:</label>

                        <input wire:model="cidade" data-toggle="tooltip" data-placement="top" title="Digite a Cidade" id="cidade" class="form-control" type="text" name="cidade" :value="old('cidade')" required autofocus/>
                    </div>

                    <div class="col-3 justify-content-center align-items-center mx-auto mt-2">
                        <label class="text-white" for="uf">UF:</label>

                        <input wire:model="uf" data-toggle="tooltip" data-placement="top" title="Digite o UF" id="uf" class="form-control" type="text" name="uf" :value="old('uf')" required autofocus/>
                    </div>

            @endif                      
    </div>
    <div class="row">

            <div class="col">

                <select name="produtoscompra" id="produtoscompra"  wire:model="produtocompra_id" class="form-control">
                    <option value="null">Selecione um Produto</option>
                    @foreach($produtos as $produto)

                        <option value="{{ $produto->id }}">{{ $produto->prod_name }}</option>

                    @endforeach
                    </select>

            </div>
            <div class="col">
                <div class="input-group mb-3 col-sm">
                    <label for="inputAddress" class="form-label"></label>
                    <input  type="number"  wire:model="valor"  name="prod_price" placeholder="Preço"  min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />
                </div>
            </div>
            <div class="col">

                <button class="btn btn-primary"  wire:click="additens">+</button>
            </div>
        </div>

        <table id="example" class="table table-striped table-bordered my-4" style="width: 100%;">

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
        @if($pedido_id !=null)
            <tbody>
                    <!--    -->

                @foreach ($pedido[0]->produtoscompra as $produto)

                    <tr role="row" class="odd">


                        <td class="sorting_1">{{ $produto->id }}</td>
                        <td>{{ $produto->prod_name }}</td>
                        <td>{{ $produto->pivot->qtd }}</td>
                        <td>{{ $produto->pivot->valor }}</td>

                        <td>R$ {{ number_format($produto->pivot->desconto,2,",",".") }}</td>
                        <td>

                        </td>
                    </tr>
                @endforeach
            </tbody>
         @endif
        </table>
    </div>
</div>

@section('script')

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>

        const preencherFormulario = (endereco) => {
            document.getElementById('endereco').value   = endereco.logradouro;
            document.getElementById('bairro').value     = endereco.bairro;
            document.getElementById('cidade').value     = endereco.localidade;
            document.getElementById('uf').value         = endereco.uf;
        }

        const pesquisarCEP = async() => {
           
            $("#erroCEP").hide(300);
            document.getElementById('endereco').value = "";
            document.getElementById('bairro').value = "";
            document.getElementById('cidade').value = "";
            document.getElementById('uf').value = "";

            const cep = $('#cep').val();
            const url = "http://viacep.com.br/ws/"+cep+"/json/";

            const dados = await fetch(url);
            const endereco = await dados.json();
         
            if(endereco.hasOwnProperty('erro')){
                $("#erroCEP").show(300);
            }else{
                $("#erroCEP").hide();
                preencherFormulario(endereco);
            }
        }

        document.getElementById('cep').addEventListener('focusout', pesquisarCEP);

    </script>

    <script>
        $(document).ready(function () {
            var $cep = $("#cep");
            $cep.mask('00000-000');
        });
        $(document).ready(function () {
            var $cel = $("#cel");
            $cel.mask('(00)00000-0000');
        });
    </script>

@endsection