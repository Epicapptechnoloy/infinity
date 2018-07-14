<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Wishlists extends Authenticatable
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_customer_wishlist';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_id', 'date_start'
    ];
	
	
	
}
