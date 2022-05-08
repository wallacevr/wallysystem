<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosVendaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function messages()
    {
        return [
            'product_sale_name.required'=>'Campo Produto é Obrigatório!',
            'product_sale_name.string'=>'Preencha o campo Produto com Letras e/ou Números!',
            'product_sale_name.max'=>'O Tamanho máximo do campo Produto é de 255 caracteres!',
            'product_sale_category.required'=>'Campo Categoria é Obrigatório!',
            'product_sale_category.string'=>'Preencha o campo Categoria com Letras e/ou Números!',
            'product_sale_category.max'=>'O Tamanho máximo do campo Categoria é de 255 caracteres!',
            'product_sale_color.required'=>'Campo Cor é Obrigatório!',
            'product_sale_color.string'=>'Preencha o campo Cor com Letras e/ou Números!',
            'product_sale_color.max'=>'O Tamanho máximo do campo Cor é de 255 caracteres!',
            'product_sale_ncm.required'=>'Campo NCM é Obrigatório!',
            'product_sale_ncm.string'=>'Preencha o campo NCM com Letras e/ou Números!',
            'product_sale_ncm.max'=>'O Tamanho máximo do campo NCM é de 255 caracteres!',
            'product_sale_obs.required'=>'Campo Observações é Obrigatório!',
            'product_sale_obs.string'=>'Preencha o campo Observações com Letras e/ou Números!',
            'product_sale_obs.max'=>'O Tamanho máximo do campo Observações é de 255 caracteres!',
            'product_sale_group.required'=>'Campo grupo é Obrigatório!',
            'product_sale_group.string'=>'Preencha o campo grupo com Letras e/ou Números!',
            'product_sale_group.max'=>'O Tamanho máximo do campo Grupoo é de 255 caracteres!',
            'product_sale_character.required'=>'Campo Características é Obrigatório!',
            'product_sale_character.string'=>'Preencha o campo Características com Letras e/ou Números!',
            'product_sale_character.max'=>'O Tamanho máximo do Características Produto é de 255 caracteres!',
            'product_sale_code.required'=>'Campo Código é Obrigatório!',
            'product_sale_code.string'=>'Preencha o campo Código com Letras e/ou Números!',
            'product_sale_code.max'=>'O Tamanho máximo do campo Código é de 255 caracteres!',
            'product_sale_family.required'=>'Campo Familia é Obrigatório!',
            'product_sale_family.string'=>'Preencha o campo Família com Letras e/ou Números!',
            'product_sale_family.max'=>'O Tamanho máximo do campo Família é de 255 caracteres!',
            'product_sale_price.required'=>'Campo Preço é Obrigatório!',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_sale_name'  => 'required|string|max:255',
            'product_sale_category'  => 'required|string|max:255',
            'product_sale_ncm'  => 'required|string|max:255',
            'product_sale_obs'  => 'required|string|max:255',
            'product_sale_group'  => 'required|string|max:255',
            'product_sale_character'  => 'required|string|max:255',
            'product_sale_color'  => 'required|string|max:255',
            'product_sale_code'  => 'required|string|max:255',
            'product_sale_family'  => 'required|string|max:255',
            'product_sale_price'  => 'required',
        ];
    }
}
