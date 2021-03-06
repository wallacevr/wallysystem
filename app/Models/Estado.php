<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// definindo quais atributos do Model vão ser atribuidos em massa. estado.php    =    view ( fornecedores/create.blade)

class Estado extends Model
{
    use HasFactory;

    protected $table = 'state';

    public $timestamps = false;
    
    protected $fillable = [
        'name', 
        'abbreviation   ',
    ];    
    
}
