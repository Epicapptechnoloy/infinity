<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Products extends Authenticatable
{
    protected $AssistantId;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_product';
     protected $primaryKey ='product_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	
	 
    protected $fillable = [
        'product_id', 'category_id','sub_category_id','name','model','sku','upc','ean','jan','isbn','mpn','quantity','image','manufacturer_id','shipping', 'price','size_id',
		'color_id','points','date_available','weight','weight_class_id','length','width','height','subtract','minimum','sort_order','status','description','is_promotion','is_featured','viewed'
    ];
    
    /**
     * Get the doctor record.
     */
    public function image()
    {
        return $this->hasMany('App\Model\ProductImages');
    }    
   
}

