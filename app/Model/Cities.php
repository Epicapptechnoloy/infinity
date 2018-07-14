<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_cities';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'state_id',
    ];
    
     /**
     * Get the clinic state name
     */
    public function ClinicCityName()
    {
        return $this->belongsTo('App\Model\Clinics','cityId');
    }
    
}
