<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'solpoo_doctor_banners';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctorId', 'bannerName','bannerImage','bannerText','status','modifyBy',
    ];
}
