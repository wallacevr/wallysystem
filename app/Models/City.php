<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// definindo quais atributos do Model vão ser atribuidos em massa. estado.php    =    view ( fornecedores/create.blade)

class City extends Model
{
    use HasFactory;

    protected $table = 'city';

    public $timestamps = false;
    
    protected $fillable = [
        'name', 
        'ibge_code',
        'state_id'
    ];    
    
}
