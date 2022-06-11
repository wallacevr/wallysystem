<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'sp_product';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [

            'prod_name',
            'prod_category',
            'prod_unit',
            'prod_ncm',
            'prod_note',
    ];
}
