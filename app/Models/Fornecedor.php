<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BancoForn;
// definindo quais atributos do Model vão ser atribuidos em massa. fornecedor.php    =    view ( fornecedores/create.blade)
//  definiu o model da primary key onde vai ser atribudos os valoes meio q um autorizaçao
//atribuir o Model que reconheça a sua chave primária  protected $primaryKey = 'sup_id'; p/ metodo update

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'sp_supplier';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
           
            'sup_type',
            'person',
            'name',
            'rg',
            'cpf',
            'cnpj',
            'coop_name',
            'fantasy',
            'municipal_reg',
            'state_reg',
            'postal_code',
            'address',
            'number',
            'complement',
            'neighbourhood',
            'city',
            'state',
            'country',
            'telephoe',
            'cellphone',
            'emails',
            'notes',
            'sup_ids',
            'fantasy_cpf', 
            'empresa_id',
            'created_at',
            'updated_at',
            'deleted_at'           
    ];

     //relacionamento da tabela retornando um relacionamento
     // public function user(){
     //hasone retornando o parararemnteo ( o modelo relacionado e as duas chaves)
     // return $this->belongsTo(User::class);}
   public function contas(){
        return $this->hasMany(BancoForn::class, 'sup_id', 'id');
   }
       
    
}
