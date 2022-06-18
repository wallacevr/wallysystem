<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// definindo quais atributos do Model vão ser atribuidos em massa. banco.php    =    view ( fornecedores/create.blade)

class BancoForn extends Model
{
    use HasFactory;

    protected $table = 'sp_supp_bank';

    public $timestamps = false;

    protected $fillable = [

        'banco_id',
        'agency', 
        'digit', 
        'amount',
        'digit_amount', 
        'type', 
        'sup_id', 
        'type_acc', 
        'b_favorecido',
        'b_cpf',    
        'empresa_id',
        'created_at',
        'updated_at',
        'deleted_at'  
        
    ];

}    
