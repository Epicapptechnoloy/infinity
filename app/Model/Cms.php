<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
     /**
     * set the table name which is belong this model
     *
     * @var array
     */
    protected $table = 'sb_cms';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','title','description','created','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
  
}
