<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
	<!--plugins-->



	@yield("style")
	<link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

	<title>WallySystem</title>
</head>

<body class="bg-theme bg-theme1 py-5">
	<!--wrapper-->
    <div class="card-body">
    <div class="row justify-content-center vertical-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Empresa') }}</div>

                <div class="card-body">
                <form  class="row gy-2 gx-3 align-items-center m-2"  action="{{route('empresas.create')}}" method="POST" enctype="multipart/form-data" name="clienteform" id="clienteform" >

@csrf
<div class="row pl-4">
        <div class="col-12 p-1 menuMinhaconta">
                <p class="text-muted ">Inclua aqui os dados cadastrais da Empresa</p>
            </div>
        </div>
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


        <div class="col-auto w-50 mb-2">
                    <input type="text"  name="razaosocial" class="form-control" placeholder="Razão Social"  >

            </div>



            <div class="col-auto w-50 mb-2">
                <input type="text"  id="cnpj" name="cnpj" class="form-control" placeholder="CNPJ"  >

            </div>
            <div class="col-auto w-50 mb-2">
                <input type="text"  id="ie" name="ie" class="form-control" placeholder="I.E."  >

            </div>
            <div class="col-auto w-50 mb-2">
                <input type="text"  id="ccm" name="ccm" class="form-control" placeholder="C.C.M."  >

            </div>




            <div class="col-6 mb-2">
                <input  type="email" class="form-control" name="email" placeholder="Email" >

            </div>

            <div class="col-3  mb-2">
                <input  type="tel" class="form-control" id="celular" style="max-width:145px;" name="celular" placeholder="Celular" >

            </div>
            <div class="col-3 mb-2">
                <input  type="text" class="form-control" id="cep" name="cep" placeholder="CEP"  >

            </div>
            <div class="col-auto w-50 mb-2">
                <input  type="text" class="form-control" name="endereco" placeholder="endereco" >

            </div>

            <div class="col-auto w-25 mb-2">
                <input  type="text" class="form-control" name="num" placeholder="Nº" >

            </div>
            <div class="col-auto w-25 mb-2">
                <input type="text" class="form-control" name="complemento" placeholder="Complemento"  >

            </div>
            <div class="col-12  mb-2">
                <input  type="text" class="form-control" placeholder="Bairro" name="bairro" >

            </div>
            <div class="col-10  mb-2">
                <input  type="text" class="form-control" placeholder="Cidade" name="cidade"  >

            </div>
            <div class="col-2 mb-2">
                <input  type="text" class="form-control "  placeholder="UF" name="uf"  >

            </div>
            <div class="col-12">

                 <input id="nome" class="form-control" type="text" name="nome" required  placeholder="Nome do Admin" ></input>
            </div>
            <div class="col-6">
                <input type="password" class="form-control" name="password" placeholder="Senha" rows="1"></input>
            </div>

            <div class="col-6">

                <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required  placeholder="Confirmação de Senha" rows="1"></input>
            </div>

            <div class="col-12 w-50 mr-4 text-left">
                <button type="submit" class="btnSalvarMinhaconta" data-toggle="tooltip" data-placement="left" title="CONFIRMAR">CONFIRMAR</a>
            </div>
</form>

                </div>
            </div>
        </div>
    </div>
</div>



	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('assets/js/app.js') }}"></script>



</body>

</html>
