<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserBillingAddress extends Authenticatable
{
    use Notifiable;
	protected $table = 'sb_user_billing_address';
	protected $primaryKey = 'address_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'address', 'city', 'state_id', 'zip', 'country_id', 'phone', 'name', 'status', 
		'address1', 'address2', 'created_at', 'updated_at'
		
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array

     */
	public function userAccount(){
        return $this->belongsTo('App\Model\UserAccount', 'user_id', 'user_id');
    }
	 
	 
	 
	public function country(){
        return $this->belongsTo('App\Model\Countries', 'country_id');
    }
	
	public function state(){
        return $this->belongsTo('App\Model\States', 'state_id');
    }
	 
	public function userBillingAddress(){
        return $this->hasMany('App\Model\UserBillingAddress', 'address_id', 'address_id');
    }
   
}
