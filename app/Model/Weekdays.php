<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Weekdays extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'solpoo_week_days';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dayName', 'shortName',
    ];
}
