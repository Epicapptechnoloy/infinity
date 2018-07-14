<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class ProductToCategory extends Authenticatable
{
    protected $AssistantId;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_category';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'product_id'
    ];
    
    /**
     * Get the product record.
     */
    public function products()
    {
        return $this->belongsTo('App\Model\Products');
    }
    
    
    
}
