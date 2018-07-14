<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Orders extends Authenticatable
{
    protected $primaryKey = 'order_id';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_order';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'user_id', 'total_amount','status', 'created_at','updated_at'
    ];
    
    /**
     * Get the order product record.
     */
    public function orderProducts()
    {
        return $this->hasMany('App\Model\Products');
    }
    
    /**
     * Get the orders's shipping address details 
     */
    public function getShippingAddress()
    {
        return $this->belongsTo('App\Address');
    }
    
    /**
     * Get the orders's billing address details 
     */
    public function getBillingAddress()
    {
        return $this->belongsTo('App\Address');
    }
    
   
    
}
