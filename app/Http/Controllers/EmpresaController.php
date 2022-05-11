<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
Use App\Models\Empresa;
use App\Models\User;
use App\Http\Requests\EmpresaRequest;
class EmpresaController extends Controller
{
    //
    public function store(EmpresaRequest $request){

        try {
            //code...
            $empresa = new Empresa;
            $empresa->cnpj              =   $request->cnpj;
            $empresa->razaosocial       =   $request->razaosocial;
            $empresa->email             =   $request->email;
            $empresa->ie                =   $request->ie;
            $empresa->ccm               =   $request->ccm;
            $empresa->cep               =   $request->cep;
            $empresa->endereco          =   $request->endereco;
            $empresa->num               =   $request->num;
            $empresa->complemento       =   $request->complemento;
            $empresa->bairro            =   $request->bairro;
            $empresa->cidade            =   $request->cidade;
            $empresa->uf                =   $request->uf;
            $empresa->celular           =   $request->celular;
            $empresa->save();
            $usuario = new User;
            $usuario->email             =   $request->email;
            $usuario->name              =   $request->nome;
            $usuario->empresa_id        =   $empresa->id;
            $usuario->grupo_id          =   2;
            $usuario->password          =   Hash::make($request->password);
            $usuario->grupo_id          =   1;
            $usuario->save();
            return redirect()->route('login')->withSuccess('Usuário cadastrado com sucesso!');

        } catch (\Throwable $Error) {
            //throw $th;
            dd($Error);
            return redirect()->back()->withInput($request->all())->withErrors([
                'message' => [
                    $Error->getMessage()
                ],
            ]);
        }
    }
}
