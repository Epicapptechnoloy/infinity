<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class ProductCart extends Authenticatable
{
    protected $AssistantId;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_product_cart';
    protected $primaryKey ='cart_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	
    protected $fillable = [
        'cart_id', 'user_id','product_id','user_session_id','qty','total_price','created_at','updated_at'
    ];
    
    /**
     * Get the doctor record.
     */
      
   
}

