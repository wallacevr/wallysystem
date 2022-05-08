@extends('layouts.app')

@section('style')
<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
@endsection

@section('wrapper')

<div class="card-body p-2">
		<div class="card-title d-flex align-items-center">
			<div><i class=" me-1 font-22 text-white"></i>
			</div>
			<h5 class="mb-0 text-white">Cadastro Produtos de Venda</h5>
		</div>

		<hr>
        <div class="row">
            <div class="col-12">
            @if($errors->any())

                <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
                </div>
            @elseif(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>

            @endif
            </div>


        </div>
		<form method="post" action="{{ route('produtoVenda.store') }}" class="row g-3">
		@csrf
		@method('post')

        <div class="card-body p-2">
		<div class="card-title d-flex align-items-center">
			<div><i class=" font-14 text-white"></i>
			</div>
			<h5 class="mb-0 text-white">informações do Produto</h5>
		</div>

           	</div>
				 <div class="col-6">
				 <label for="inputAddress" class="form-label"></label>

								<input type="text" class="form-control" name="product_sale_name" placeholder="Produto" ></input>
									</div>

                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_category" placeholder="Categoria" ></input>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_color" placeholder="Cor" ></input>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_ncm" placeholder="NCM" ></input>
									</div>
									<div class="col-12">
										<label for="inputAddress" class="form-label"></label>
										<textarea type="text" class="form-control" name="product_sale_obs" placeholder="Observações" ></textarea>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_group" placeholder="Grupo" ></input>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_character" placeholder="Características" ></input>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_code" placeholder="Código" ></input>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_family" placeholder="Família" ></input>
									</div>
                                    <div class="input-group mb-3 col-sm">
                                         <label for="inputAddress" class="form-label"></label>
                                        <input  type="number"   name="product_sale_price" placeholder="Preço"  min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" />
                                    </div>
									<div class="col-6">
										<button type="submit" class="btn btn-success">Salvar Produto</button>
									</div>

		</form>
			</div>

@endsection

@section('script')
<script src="{{ asset('assets/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
  <script>
      $(function() {
          $(".knob").knob();
      });
  </script>
  <script src="{{ asset('assets/js/index.js') }}"></script>
@endsection
