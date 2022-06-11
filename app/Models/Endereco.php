<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $table = 'enderecos';
    protected $fillable =[
        'nome',
       'tipo_end',
       'cep',
       'endereco',
       'num',
       'complemento',
       'bairro',
        'state_id',
        'city_id',
       'pais',
       'tel',
       'cel',
       

    ];

}
