<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Review extends Authenticatable
{
   
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_review';
    
    protected $primaryKey ='review_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'user_id','author','comments', 'rating','status','date_added','date_modified','created_at','updated_at'
    ];
    
    /**
     * Get the category product record.
     */
    public function categoryProducts()
    {
        return $this->hasMany('App\Model\ProductToCategory');
    }
    
    public function getUser(){
        return $this->belongsTo('App\Model\User', 'user_id');
    }
    
}
