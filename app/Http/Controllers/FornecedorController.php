<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FornecedorRequest;
use App\Models\Fornecedor;
use App\Models\BancoForn;
use App\Models\Estado;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = Fornecedor::all()->where('empresa_id','=',Auth::user()->empresa_id);

        return view('fornecedor.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bancos = BancoForn::all();
        $estados = Estado::all();

        return view('fornecedor.create', compact('bancos','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
                    //$request->empresa_id=Auth::user()->empresa_id;
        $fornecedor= new Fornecedor;
        $fornecedor->sup_type = $request->sup_type;
        $fornecedor->person = $request->person;
        $fornecedor->name = $request->name;
        $fornecedor->rg = $request->rg;
        $fornecedor->cpf = $request->cpf;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->coop_name = $request->coop_name;
        $fornecedor->fantasy = $request->fantasy;
        $fornecedor->municipal_reg = $request->municipal_reg;
        $fornecedor->state_reg = $request->state_reg;
        $fornecedor->postal_code = $request->postal_code;
        $fornecedor->address = $request->address;
        $fornecedor->number = $request->number;
        $fornecedor->complement = $request->complement;
        $fornecedor->neighbourhood = $request->neighbourhood;
        $fornecedor->city = $request->city;
        $fornecedor->state = $request->state;
        $fornecedor->country = $request->country;
        $fornecedor->telephoe = $request->telephoe;
        $fornecedor->cellphone = $request->cellphone;
        $fornecedor->emails = $request->emails;
        $fornecedor->notes = $request->notes;
        $fornecedor->sup_ids = $request->sup_ids;
        $fornecedor->fantasy_cpf = $request->fantasy_cpf;
        $fornecedor->notes = $request->notes;
        $fornecedor->empresa_id=Auth::user()->empresa_id;
        $fornecedor->created_at = new Carbon;
        $fornecedor->save();
        
            if($request->banco_id!=null && $request->b_favorecido!=null && $request->b_cpf!=null && $request->type_acc!=null && $request->agency!=null && $request->digit!=null && $request->amount!=null && $request->digit_amount!=null){
                
                $conta = new BancoForn;
                $conta->sup_id= $fornecedor->id;
                $conta->banco_id = $request->banco_id;
                $conta->agency = $request->agency;
                $conta->digit = $request->digit;
                $conta->amount = $request->amount;
                $conta->digit_amount = $request->digit_amount;
                $conta->type_acc = $request->type_acc;
                $conta->type = $request->type_acc;
                $conta->b_favorecido = $request->b_favorecido;
                $conta->b_cpf = $request->b_cpf;
                $conta->created_at = new Carbon;
                $conta->empresa_id=Auth::user()->empresa_id;
                $conta->save();
            }
        // Fornecedor::create($request->all());

            return redirect()->route('fornecedor.index')->with('success','Fornecedor cadastrado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor  $fornecedor)
    {
        return view('fornecedor.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor  $fornecedor)
    {
      
        $bancos = BancoForn::all();
        $estados = Estado::all();
        $fornecedores = Fornecedor::where('id','=',$fornecedor->id)->with('contas')->get();
       $fornecedor=$fornecedores[0];
   
        return view('fornecedor.edit', compact('fornecedor', 'bancos', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor  $fornecedor)
    {
        
        try {
            //$request->empresa_id=Auth::user()->empresa_id;
           
            $fornecedor->sup_type = $request->sup_type;
            $fornecedor->person = $request->person;
            $fornecedor->name = $request->name;
            $fornecedor->rg = $request->rg;
            $fornecedor->cpf = $request->cpf;
            $fornecedor->cnpj = $request->cnpj;
            $fornecedor->coop_name = $request->coop_name;
            $fornecedor->fantasy = $request->fantasy;
            $fornecedor->municipal_reg = $request->municipal_reg;
            $fornecedor->state_reg = $request->state_reg;
            $fornecedor->postal_code = $request->postal_code;
            $fornecedor->address = $request->address;
            $fornecedor->number = $request->number;
            $fornecedor->complement = $request->complement;
            $fornecedor->neighbourhood = $request->neighbourhood;
            $fornecedor->city = $request->city;
            $fornecedor->state = $request->state;
            $fornecedor->country = $request->country;
            $fornecedor->telephoe = $request->telephoe;
            $fornecedor->cellphone = $request->cellphone;
            $fornecedor->emails = $request->emails;
            $fornecedor->notes = $request->notes;
            $fornecedor->sup_ids = $request->sup_ids;
            $fornecedor->fantasy_cpf = $request->fantasy_cpf;
            $fornecedor->notes = $request->notes;
            $fornecedor->empresa_id=Auth::user()->empresa_id;
            $fornecedor->created_at = new Carbon;
            $fornecedor->save();
            $fornecedor = Fornecedor::where('id','=',$fornecedor->id)->withCount('contas')->with('contas')->get();
           
            if($request->banco_id!=null && $request->b_favorecido!=null && $request->b_cpf!=null && $request->type_acc!=null && $request->agency!=null && $request->digit!=null && $request->amount!=null && $request->digit_amount!=null){
                
                if($fornecedor[0]->contas_count==0){
                    $conta = new BancoForn;
                   
               }else{
                    $conta = BancoForn::findOrFail($fornecedor[0]->contas[0]->id);
               }
                    $conta->sup_id= $fornecedor[0]->id;
                    $conta->banco_id = $request->banco_id;
                    $conta->agency = $request->agency;
                    $conta->digit = $request->digit;
                    $conta->amount = $request->amount;
                    $conta->digit_amount = $request->digit_amount;
                    $conta->type_acc = $request->type_acc;
                    $conta->type = $request->type_acc;
                    $conta->b_favorecido = $request->b_favorecido;
                    $conta->b_cpf = $request->b_cpf;
                    $conta->created_at = new Carbon;
                    $conta->empresa_id=Auth::user()->empresa_id;
                    $conta->save();
            }
            // Fornecedor::create($request->all());

            return redirect()->route('fornecedor.index')->with('success','Fornecedor cadastrado com sucesso!');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor  $fornecedor)
    {
        $fornecedores->delete();

        return redirect()->route('fornecedor.index');
    }
}

