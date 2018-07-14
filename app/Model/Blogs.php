<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'solpoo_doctor_blogs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctorId', 'blogName','blogImage','blogDescription','status',
    ];
}
