@extends('layouts.app')

@section('style')
<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('wrapper')

<div class="card-body">

	<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
        <div class="row">

            <div class="col-sm-12 col-md-6"></div>
                <div id="example_filter" class="dataTables_filter">
                    <a href="{{ route('pedidoVenda.create') }}" class="btn btn-success float-right">Adicionar</a>
                    </div>
                </div>
            </div>
                <div class="row"><div class="col-sm-12">
        <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered " style="width: 100%;">

        <thead>
			<tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >ID</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Cliente</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Data</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Tipo do Produto</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Preço</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Parcelas</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">Acao</th>
            </tr>
		</thead>

		<tbody>

                 <!--    -->
    		@foreach ($pedidosVenda as $pedido)
                <tr role="row" class="odd">

                    <td class="sorting_1"> {{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente->name }}</td>
                    <td>{{ $pedido->created_at->format('d/m/Y')}}</td>
                    <td>
                        @if($pedido->produtosvenda->count('pedido_id')>0)
                            {{strlen($pedido->produtosvenda[0]->product_sale_name)<= 20? $pedido->produtosvenda[0]->product_sale_name: substr($pedido->produtosvenda[0]->product_sale_name,0,-20)  }}
                                {{$pedido->produtosvenda->count('pedido_id') >1? '+'.($pedido->produtosvenda->count('pedido_id')-1 ): '' }}
                        @endif
                    </td>
                    @php
                      $total=0;
                      foreach($pedido->produtosvenda as $produtos){
                          $total= $total+$produtos->pivot->total;
                      }

                    @endphp
                    <td> R$ {{ number_format($total ,2,",",".") }}</td>
                    <td>{{ $pedido->installments }}</td>
                    <td>
                        <form action="" method="post">
                        @csrf
                        @method('delete')
                            <a href="{{ route('pedidoVenda.edit',['pedidoVenda'=> $pedido->id]) }}" class="btn btn-warning">Editar</a>

                            <button type="submit"class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>

        <!--
    	<tfoot>
    		<tr>
            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 134px;">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 207px;">Pessoa</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 93px;">Nome</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 39px;">CEP</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 88px;">Endereco</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 71px;">Numero</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 71px;">Bairro</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 71px;">Cidade</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 71px;">Acao</th>
            </tr>
    	</tfoot>
        -->

    </table>

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
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
  <script>
      $(function() {
          $(".knob").knob();
      });
  </script>
  <script src="{{ asset('assets/js/index.js') }}"></script>
@endsection
