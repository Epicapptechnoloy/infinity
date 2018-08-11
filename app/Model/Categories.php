<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Categories extends Authenticatable
{
   
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_category';
    
    protected $primaryKey ='category_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'name','description','image','top'
    ];
    
    /**
     * Get the category product record.
     */
    public function categoryProducts()
    {
        return $this->hasMany('App\Model\ProductToCategory');
    }
    
	
	public function SubCategory() {
        return $this->hasMany('App\Model\SubCategory','category_id','category_id');
    }
    
    
}
