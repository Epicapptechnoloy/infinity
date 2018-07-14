<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class OrderDetails extends Authenticatable
{
    protected $primaryKey = 'id';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_order_details';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','order_id', 'product_id', 'qty','status', 'created_at','updated_at'
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
