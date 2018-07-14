<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','provider_user_id', 'provider','api_token','isVerified','otp','doctor_id','status','fileName'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    /**
     * Get the patient doctor
     */
    public function doctor()
    {
        return $this->belongsTo('App\Model\Doctors','doctor_id');
    }
    
    /**
     * Get the patient appointment list 
     */
    public function appointMentList()
    {
        return $this->hasMany('App\Model\PatientAppointment', 'patient_Id')->where('appt_date','>=', date('Y-m-d'));
    }
    
    /**
     * Get the patient's doctor details 
     */
    public function patientDoctorDetails()
    {
        return $this->belongsTo('App\Model\Doctors','doctor_id');
    }
    
   

}
