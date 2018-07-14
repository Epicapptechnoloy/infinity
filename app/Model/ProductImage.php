<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_product_image';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'ImageName','status',
    ];
    
     
}
