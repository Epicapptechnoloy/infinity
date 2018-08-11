<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSizes extends Model
{
	
	protected $table = 'sb_product_sizes';
	protected $primaryKey = 'size_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'size_name', 'status'
    ];
	

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
	
	public function size(){
        return $this->hasMany('App\Model\ProductSizesMap', 'size_id');
    }

}
