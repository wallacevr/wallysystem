<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'razaosocial.required'=>'Campo Razão Social é Obrigatório!',
            'razaosocial.max'=>'O Tamanho máximo do campo Razão Social é de 255 caracteres!',
            'razaosocial.string' => 'Preecha o campo Razão Social com Letras e/ou Números!',
            'cnpj.required'=>'Campo CNPJ é Obrigatório!',
            'cnpj.size'=>'O Tamanho do campo CNPJ é inválido!',
            'celular.required' => 'O campo celular é obrigatório!',
            'email.required' => 'O Campo Email é obrigatório!',
            'email.email' => 'Email inválido!',
            'email.max' => 'O Tamanho máximo do campo email é de 255 caracteres!',
            'email.unique' => 'Email já cadastrado!',
            'cep.required'=>'Campo cep é Obrigatório!',
            'endereco.required'=>'Campo Endereço é Obrigatório!',
            'endereco.max'=>'O Tamanho máximo do campo Endereço é de 255 caracteres!',
            'endereco.string' => 'Preecha o campo Endereço com Letras e/ou Números!',
            'num.required'=>'Campo Nº é Obrigatório!',
            'num.max'=>'O Tamanho máximo do campo Nº é de 255 caracteres!',
            'num.string' => 'Preecha o campo Nº com Letras e/ou Números!',
            'complemento.required'=>'Campo complemento é Obrigatório!',
            'complemento.max'=>'O Tamanho máximo do campo complemento é de 255 caracteres!',
            'complemento.string' => 'Preecha o campo Complemento com Letras e/ou Números!',
            'bairro.required'=>'Campo Bairro é Obrigatório!',
            'bairro.max'=>'O Tamanho máximo do campo Bairro é de 255 caracteres!',
            'bairro.string' => 'Preecha o campo Bairro com Letras e/ou Números!',
            'cidade.required'=>'Campo Cidade é Obrigatório!',
            'cidade.max'=>'O Tamanho máximo do campo Cidade é de 255 caracteres!',
            'cidade.string' => 'Preecha o campo Cidade com Letras e/ou Números!',
            'uf.required'=>'Campo UF é Obrigatório!',
            'uf.max'=>'O Tamanho máximo do campo UF é de 255 caracteres!',
            'uf.string' => 'Preecha o campo UF com Letras e/ou Números!',
            'password.required'=>'Campo senha é Obrigatório!',
            'password.string'=>'Preencha senha somente com letras e numeros!',
            'password.min'=>'Senha deve ter no mínimo 8 caracteres!',
            'password.confirmed'=>'Senha e confirmação de senha devem ser iguais!',
        ];
    }


    public function rules()
    {
        switch($this->method()){
            case 'POST':
                return [
                    'razaosocial'  => 'required|string|size:255',
                    'cnpj'  => 'required|string|size:18',
                    'email' => 'required|email|max:255|unique:users',
                    'celular' =>'required|size:14|string',
                    'cep' =>'required|size:9|string',
                    'endereco' =>'required|max:255|string',
                    'num' =>'required|max:255|string',
                    'complemento' =>'required|max:255|string',
                    'bairro' =>'required|max:255|string',
                    'cidade' =>'required|max:255|string',
                    'uf' =>'required|size:2|string',
                    'password'=>'required|min:8|string'
                ];
                break;
            case 'PUT':

                return [
                    'razaosocial'  => 'required|string|max:255',
                    'email' => "required|email|unique:users,email,".$this->user->id
                ];
                break;
        }
    }
}
