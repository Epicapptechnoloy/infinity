<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class ProductAttributes extends Authenticatable
{
    protected $product_id;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_product_attribute';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'attribute_id'
    ];
    
   
}
