<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Countries extends Authenticatable
{
    use Notifiable;
	
	protected $table = 'sb_countries';
	protected $primaryKey = 'country_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_code','country_name','status','bonus'
    ];
	
	
	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
	
	
	/* public function state(){
        return $this->hasMany('App\Model\States', 'country_id');
    } */
  
}
