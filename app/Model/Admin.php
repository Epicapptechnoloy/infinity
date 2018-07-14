<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    protected $AssistantId;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sb_admin';
    
    protected $timestamp = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titleId', 'fname', 'mname','lname', 'email','password','modifyBy', 'reset_password_token'
    ];
    
    /**
     * Get the doctor record.
     */
    public function admin()
    {
        return $this->belongsTo('App\Model\Admin');
    }
    
    /**
     * Get the patient's doctor details 
     */
    public function patientDoctorDetails()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Get the doctor's time slot
     */
    public function doctorTimeSlot()
    {
        return $this->hasMany('App\Model\DoctorTimeSlot','clinic_Id');
    }

    /**
     * Get the doctor's details
     */
    public function doctorDetails()
    {
        return $this->hasOne('App\Model\DoctorDetails','doct_id');
    }
    
}
