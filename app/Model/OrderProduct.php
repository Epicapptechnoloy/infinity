<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class OrderProduct extends Authenticatable
{
    protected $order_product_id;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_order_product';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'order_id'
    ];
    
   
}
