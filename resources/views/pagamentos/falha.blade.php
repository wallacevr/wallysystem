@extends('layouts.app')

@section('pagina_titulo', 'Falha ao comprar')

@section('content')


<div class="container py-10 mb-3">
    <div class="row">
        <div class="col-12">
            <div class="col-12 mt-4">
                <div class="card card-sucesso py-5">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 justify-content-center align-items-center text-center align-middle d-flex">
                            <i class="fa-solid fa-circle-exclamation text-danger" style="font-size: 60px"></i>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 justify-content-center align-items-center mt-4">
                            <p class="text-black text-bold text-center" style="font-size: 20px">Opa! parece que sua compra foi <strong>recusada</strong>, você verá mais detalhes
                                acessando os seus pedidos e compras.</p>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-12 text-center mt-4 mb-3">
                              <a href="{{ route('usuarios.meus-pedidos', Auth::user()->id) }}" class="btnAcessarPedidos">Acessar meus pedidos</a>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-12 text-center mt-4">
                              <a href="{{ route('home') }}" class="btnGenomasContinuarCompra">Voltar para a página inicial</a>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

@push('scripts')
@endpush
