<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class SubCategory extends Authenticatable
{
   
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_sub_category';
    
    protected $primaryKey ='sub_category_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sub_category_id','category_id', 'name','description','image','top'
    ];
    
    /**
     * Get the category product record.
     */
    public function categoryProducts()
    {
        return $this->hasMany('App\Model\ProductToCategory');
    }
    
    
    
}
