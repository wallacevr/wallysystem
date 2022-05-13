@extends('layouts.app')

@section('style')
<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
@endsection

@section('wrapper')
@foreach($user as $user)

<div class="card-body p-2">
		<div class="card-title d-flex align-items-center">
			<div><i class="bx bxs-user me-1 font-22 text-white"></i>
			</div>
			<h5 class="mb-0 text-white">Alteração de Cliente</h5>
		</div>

		<hr>
		<form method="post" action="{{ route('cliente.update',['user'=> $user->id]) }}" class="row g-3">
        @csrf
        @method('put')



        <div class="card-body p-2">
		<div class="card-title d-flex align-items-center">
			<div><i class=" me-1 font-22 text-white"></i>
			</div>
			<h5 class="mb-0 text-white">informações do Cliente</h5>


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
        </div>

                                <div class="col-6">
				                    <label for="inputAddress" class="form-label"></label>

								    <input type="text" class="form-control" name="name" placeholder="Nome" rows="1" value="{{ $user->name }}"></input>


                                </div>

                                    <div class="col-6">
										<label for="inputAddress" class="form-label"></label>
										<input type="email" class="form-control" name="email" placeholder="Email" rows="1" value="{{ $user->email }}"></input>
									</div>


									<div class="col-12">
										<button type="submit" class="btn btn-light px-5">Salvar</button>
									</div>

		</form>
			</div>
@endforeach
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
