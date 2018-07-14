<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class States extends Authenticatable
{
    use Notifiable;
	
	protected $table = 'sb_states';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	
    protected $fillable = [
        'name', 'country_id', 'status'
    ];
	
	
	 public function getStateDetailsById($id)
	{	
		$id = base64_decode($id);
		return self::select('sb_states.*','sb_states.name as name')->join('sb_countries','sb_countries.country_id', '=', 'sb_states.country_id')->where('sb_countries.country_id','=',$id)->get();
	}
	
	

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
	
	
    public function country(){
        return $this->belongsTo('App\Model\Countries', 'country_id');
    }
   

}
