<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Coupons extends Authenticatable
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
        'name', 'coupon_code', 'type','discount','amount_limit','description','logged','shipping','total','min_total',
		'valid_from','valid_to','uses_total','uses_customer','status'
    ];
    
}
