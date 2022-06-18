@extends('layouts.app')

@section('style')
<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
@endsection

@section('wrapper')



<div class="card-body p-5">
		<div class="card-title d-flex align-items-center">
			<div><i class="bx bxs-user me-1 font-22 text-white"></i>
			</div>
			<h5 class="mb-0 text-white">Atualizar Fornecedor</h5>
		</div>

		<hr>
	
		<form method="post" action="{{ route('fornecedor.update',['fornecedor'=> $fornecedor->id]) }}" class="row g-3">
        @csrf
		@method('PUT')
   <div class="row">
   <div class="card-title d-flex align-items-center">
			<div><i class="bx bxs-user me-1 font-22 text-white"></i>
			</div>
			<h5 class="mb-0 text-white">Fornecedor</h5>
		</div>

		<hr>
		<div class="col-12 col-sm-8">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @error('message')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        <div class="col-md-7">
			<label for="inputState" class="form-label">Produtos dos fornecedores</label>
			<select id="sup_type" name="sup_type" class="form-control" onchange="getSupplierType(this.value);" required="">
			<option value="">Tipo de fornecedor</option>
			   	<option value="1" 					
					@if($fornecedor->sup_type == 1)
						selected
					@endif
					>Pessoa Jurídica</option>
				<option value="2"
				@if($fornecedor->sup_type == 2)
						selected
					@endif				
				>Pessoa Física</option>
			   </select>
			   </select>
		</div>
			<div class="col-md-6">
				<label for="inputFirstName" class="form-label">CPF/CNPJ:</label>
				<input type="text" class="form-control" name="cnpj" value="{{ $fornecedor->cpf!=null?$fornecedor->cpf:$fornecedor->cnpj }}">
			</div>
			<div class="col-md-6">
				<label for="inputFirstName" class="form-label">Nome/Razão Social:</label>
				<input type="text" class="form-control" name="name" value="{{$fornecedor->name}}">
			</div>
			<div class="col-md-6">
				<label for="inputFirstName" class="form-label">RG:</label>
				<input type="text" class="form-control" name="rg" value="{{$fornecedor->rg}}">
			</div>
			<div class="col-md-6">
				<label for="inputFirstName" class="form-label">I.E.:</label>
				<input type="text" class="form-control" name="state_reg" value="{{$fornecedor->state_reg}}">
			</div>
			<div class="col-md-6">
				<label for="inputFirstName" class="form-label">C.C.M.:</label>
				<input type="text" class="form-control" name="municipal_reg" value="{{$fornecedor->municipal_reg}}">
			</div>
            <div class="col-md-6">
				<label for="inputFirstName" class="form-label">CEP:</label>
				<input type="text" class="form-control" name="postal_code" value="{{$fornecedor->postal_code}}">
			</div>
			<div class="col-md-6">
				<label for="inputFirstName" class="form-label">Endereço:</label>
				<input type="text" class="form-control" name="address" value="{{$fornecedor->address}}">
			</div>
			<div class="col-md-6">
				<label for="inputLastName" class="form-label">Numero:</label>
				<input type="text" class="form-control" name="number" value="{{$fornecedor->number}}">
			</div>
			<div class="col-md-6">
				<label for="inputEmail" class="form-label">Complemento:</label>
				<input type="text" class="form-control" name="complement" value="{{$fornecedor->complement}}">
			</div>
			<div class="col-md-6">
				<label for="inputPassword" class="form-label">Bairro:</label>
				<input type="text" class="form-control" name="neighbourhood" value="{{$fornecedor->neighbourhood}}">
			</div>
			<div class="col-md-6">
				<label for="inputPassword" class="form-label">cidade:</label>
				<input type="text" class="form-control" name="city" value="{{$fornecedor->city}}">
			</div>
			<div class="col-md-6">
			<label for="inputState" class="form-label">Estado</label>
			<select id="inputState" class="form-select" name="state" >
			<option selected=""></option>
		
		@foreach( $estados as $estado ) 
		<option value="{{ $estado->id }}" 
			@if($fornecedor->state == $estado->id)
				selected
			@endif
		>{{ $estado->abbreviation }}
		</option>
		@endforeach	
	
			</select>
		</div>
			<div class="col-md-6">
				<label for="inputPassword" class="form-label">País:</label>
				<input type="text" class="form-control" name="country" value="{{$fornecedor->country}}">
			</div>
			<div class="col-md-6">
				<label for="inputPassword" class="form-label">Telefone:</label>
				<input type="text" class="form-control" name="telephoe" value="{{$fornecedor->telephoe}}">
			</div>
            <div class="col-md-6">
				<label for="inputPassword" class="form-label">Celular:</label>
				<input type="text" class="form-control" name="cellphone" value="{{$fornecedor->cellphone}}">
			</div>
            <div class="col-md-16">
				<label for="inputPassword" class="form-label">E-mails:</label>
				<input type="email" class="form-control" name="emails" value="{{$fornecedor->emails}}">
			</div>
			<div class="col-12">
				<label for="inputAddress" class="form-label"></label>
				<textarea type="text" class="form-control" id="inputAddress" placeholder="Notes" rows="3" value="{{$fornecedor->Notes}}"></textarea>
			</div>
   </div>


        <div class="card-body p-5">
		<div class="card-title d-flex align-items-center">
			<div><i class="bx bxs-user me-1 font-22 text-white"></i>
			</div>
			<h5 class="mb-0 text-white">Conta Bancárias</h5>
		</div>

		<hr>
		@forelse($fornecedor->contas as $conta)
		<div class="row">
            
								
							<div class="col-6">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="b_favorecido" placeholder="Favorecido" rows="1" value="{{$conta->b_favorecido}}" ></input>
							</div>
							<div class="col-6">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="b_cpf" placeholder="CPF ou CNPJ" rows="1" value="{{$conta->b_cpf}}"></input>
							</div>
							<div class="col-6">
								<label for="inputState" class="form-label"></label>
								<select name="banco_id" class="form-select">
									<option name="type">Banco</option>
									<option value="104" @if($conta->banco_id==104)selected @endif>Caixa Economica</option>
									<option value="347" @if($conta->banco_id==347)selected @endif>Itaú</option>
								</select>
							</div>
							<div class="col-4">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="agency" placeholder="Agência" rows="1" value="{{$conta->agency}}"></input>
							</div>
							<div class="col-2">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="digit" placeholder="Dígito" rows="1" value="{{$conta->digit}}"></input>
							</div>
							<div class="col-4">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="amount" placeholder="Conta" rows="1" value="{{$conta->amount}}"></input>
							</div>
							<div class="col-2">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="digit_amount" placeholder="Dígito" rows="1" value="{{$conta->digit_amount}}"></input>
							</div>
											
							<div class="col-6">
								<label for="inputState" class="form-label"></label>
								<select id="type_acc" name="type_acc" class="form-select">
									<option value="1" @if($conta->type==1)selected @endif>POUPANÇA</option>
									<option value="2"@if($conta->type==2)selected @endif>CORRENTE</option>
								</select>
							</div>
		
							<div class="col-12 py-3">
								<button type="submit" class="btn btn-light px-5">Register</button>
							</div>
						</form>
			</div>
</div>
@empty
<hr>
		
      
			<div class="row">
            
								
							<div class="col-6">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="b_favorecido" placeholder="Favorecido" rows="1"></input>
							</div>
							<div class="col-6">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="b_cpf" placeholder="CPF ou CNPJ" rows="1"></input>
							</div>
							<div class="col-6">
								<label for="inputState" class="form-label"></label>
								<select name="banco_id" class="form-select">
									<option selected="" name="type">Banco</option>
									<option value="104">Caixa Economica</option>
									<option value="341">Itaú</option>
								</select>
							</div>
							<div class="col-4">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="agency" placeholder="Agência" rows="1"></input>
							</div>
							<div class="col-2">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="digit" placeholder="Dígito" rows="1"></input>
							</div>
							<div class="col-4">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="amount" placeholder="Conta" rows="1"></input>
							</div>
							<div class="col-2">
								<label for="inputAddress" class="form-label"></label>
								<input type="text" class="form-control" name="digit_amount" placeholder="Dígito" rows="1"></input>
							</div>
											
							<div class="col-6">
								<label for="inputState" class="form-label"></label>
								<select id="type_acc" name="type_acc" class="form-select">
									<option value="1">POUPANÇA</option>
									<option value="2">CORRENTE</option>
								</select>
							</div>
		
							<div class="col-12 py-3">
								<button type="submit" class="btn btn-light px-5">Register</button>
							</div>
						</form>
			</div>
</div>
@endforelse
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