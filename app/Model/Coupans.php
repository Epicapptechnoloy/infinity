<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Coupans extends Authenticatable
{
    protected $primaryKey = 'coupon_id';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_coupon';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	
    protected $fillable = [
        'name', 'code', 'type','discount','description','image','logged','shipping','total','min_total',
		'date_start','date_end','uses_total','uses_customer','status'
    ];
    
}
