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
        'name', 'email','password', 'number','country_id','state_id','city','zipcode','api_token','otp','isVerified','status','remember_token','address'
    ];
    
 
    
}
