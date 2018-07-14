<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'solpoo_settings';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_Id', 'time_slot_gap', 'modifyBy',
    ];
}
