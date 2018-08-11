<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductColors extends Model
{
	
	protected $table = 'sb_product_colors';
	protected $primaryKey = 'color_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'color_name', 'color_code', 'status'
    ];
	

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
	
	
	public function color(){
        return $this->hasMany('App\Model\Products', 'color_id');
    }
	
	

}
