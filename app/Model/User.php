<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	
    protected $AssistantId;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','first_name','last_name', 'email','password','pass', 'number','country_id','state_id','city','zipcode','api_token','gender','otp','isVerified','status'
		,'remember_token','address','facebook_id','google_id','oauth_provider','is_login', 'email_verify_status', 'lastlogin','created_at','updated_at'
    ];
    
 
    
}
