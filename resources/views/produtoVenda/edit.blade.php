@extends('layouts.app')

@section('style')
<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
@endsection

@section('wrapper')

<div class="card-body p-2">
		<div class="card-title d-flex align-items-center">
			<div><i class=" me-1 font-22 text-white"></i>
			</div>
			<h5 class="mb-0 text-white">Atualizar Produtos de Venda</h5>
		</div>

		<hr>
       @foreach($produtoVenda as $produtoVenda)
		<form method="post" action="{{ route('produtoVenda.update',['produtoVenda'=> $produtoVenda->product_sale_id]) }}" class="row g-3">
		@csrf
		@method('put')

        <div class="card-body p-2">
		<div class="card-title d-flex align-items-center">
			<div><i class=" font-14 text-white"></i>
			</div>
			<h5 class="mb-0 text-white">informações do Produto</h5>
		</div>

           	</div>
				 <div class="col-6">
				 <label for="inputAddress" class="form-label"></label>

								<input type="text" class="form-control" name="product_sale_name" placeholder="Produto" value="{{ $produtoVenda->product_sale_name }}"></input>
									</div>

                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_category" placeholder="Categoria" value="{{ $produtoVenda->product_sale_category }}"></input>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_color" placeholder="Cor" value="{{ $produtoVenda->product_sale_color }}"></input>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_ncm" placeholder="NCM" value="{{ $produtoVenda->product_sale_ncm }}"></input>
									</div>
									<div class="col-12">
										<label for="inputAddress" class="form-label"></label>
										<textarea type="text" class="form-control" name="product_sale_obs" placeholder="Observações" >{{ $produtoVenda->product_sale_obs }}</textarea>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_group" placeholder="Grupo" value="{{ $produtoVenda->product_sale_group }}"></input>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_character" placeholder="Características" value="{{ $produtoVenda->product_sale_ncm }}"></input>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_code" placeholder="Código" value="{{ $produtoVenda->product_sale_code }}"></input>
									</div>
                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="text" class="form-control" name="product_sale_family" placeholder="Família" value="{{ $produtoVenda->product_sale_family }}"></input>
									</div>
                                    <div class="input-group mb-3 col-sm">
                                         <label for="inputAddress" class="form-label"></label>
                                        <input  type="number"   name="product_sale_price" placeholder="Preço"  min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="c2" value="{{ $produtoVenda->product_sale_price }}" />
                                    </div>
									<div class="col-6">
										<button type="submit" class="btn btn-success">Atualizar Produto</button>
									</div>

		</form>
        @endforeach
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
