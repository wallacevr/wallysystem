<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ProdutoVenda;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutosVendaRequest;
class ProdutoVendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $produtosVenda = ProdutoVenda::where('empresa_id','=',Auth::user()->empresa_id)->get();

        return view ('produtoVenda.index', compact('produtosVenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtosVenda = ProdutoVenda::all();

        return view ('produtoVenda.create', compact('produtosVenda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutosVendaRequest $request)
    {

    //
        try {
            //code...
            $produto =  new ProdutoVenda;
            $produto->product_sale_name = $request->product_sale_name;
            $produto->product_sale_category = $request->product_sale_category;
            $produto->product_sale_color = $request->product_sale_color;
            $produto->product_sale_ncm = $request->product_sale_ncm;
            $produto->product_sale_obs = $request->product_sale_obs;
            $produto->product_sale_group = $request->product_sale_group;
            $produto->product_sale_character = $request->product_sale_character;
            $produto->product_sale_Code = $request->product_sale_code;
            $produto->product_sale_family = $request->product_sale_family;
            $produto->product_sale_price = $request->product_sale_price;
            $produto->empresa_id =  Auth::user()->empresa_id;
            $produto->save();
            return redirect()->route('produtoVenda.index')->withSuccess('Produto de Venda cadastrado com sucesso!');
        } catch (\Throwable $Error) {
            //throw $th;
            return redirect()->back()->withInput($request->all())->withErrors([
                'message' => [
                    $Error->getMessage()
                ],
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdutoVenda  $produtoVenda
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoVenda $produtoVenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutoVenda  $produtoVenda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtoVenda = ProdutoVenda::where('empresa_id','=',Auth::user()->empresa_id)->get();
        return view ('produtoVenda.edit', compact ('produtoVenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdutoVenda  $produtoVenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoVenda $produtoVenda)
    {

        try {
            $produtoVenda->update($request->all());

            return redirect()->route('produtoVenda.index')->withSuccess('Produto de Venda alterado com sucesso!');
        } catch (\Throwable $Error) {
            return redirect()->back()->withErrors([
                'message' =>[
                    $Error->getMessage()
                ],
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutoVenda  $produtoVenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoVenda $produtoVenda)
    {
        try {

            $produtoVenda->delete();
            return redirect()->route('produtoVenda.index')->withSuccess('Produto de Venda deletado com sucesso!');
        } catch (\Throwable $Error) {
            //throw $th;
            return redirect()->back()->withErrors([
                'message' =>[
                    $Error->getMessage()
                ],
            ]);
        }
    }
}
