<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
	
	
	protected $primaryKey = 'banner_id';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_banners';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'banner_id', 'bannerName','bannerImage','bannerText','status','modifyBy',
    ];
}
