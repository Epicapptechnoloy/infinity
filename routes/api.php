<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



/***************** API routing goes here ***************************/

// user register api

Route::post('/v1/register', 'V1\apiController@register');

// user login api

Route::post('/v1/login', 'V1\apiController@login');


Route::post('/v1/banner', 'V1\apiController@banner');




// fetch data of a particular doctor
Route::get('/v1/doctors/{id}', 'V1\apiController@getDoctor');




// patient registration api
Route::post('/v1/patient/register', 'V1\apiController@patientRegister');

//patient resend otp api 
Route::post('v1/patient/otp/resend', 'V1\apiController@resendOTP');

// patient otp verification
Route::post('/v1/patient/otp/verification', 'V1\apiController@patientOTPVerification');

// patient emergency contact details
Route::post('/v1/patient/register/emergency-contact', 'V1\apiController@patientEmergencyContact');

// patient login 
Route::post('/v1/patient/login', 'V1\apiController@patientLogin');
/***************** API routing end here ***************************/

// authentication api routing start from here

Route::group(['middleware' => 'auth:api'], function (){
        //this is used for the application listing api
    	Route::get('/v1/patient/appointment-list', 'V1\apiController@AppointmentList');
        // this is for clinic listing api
        Route::get('/v1/doctor/clinic-list', 'V1\apiController@ClinicList');        
        // this is for clinic listing api
        Route::get('/v1/doctor/time-slot', 'V1\apiController@TimeSlots');
        // this is for madicine list for patient
        Route::get('/v1/patient/medicine-list', 'V1\apiController@medinceList');
        // this is for madicine list for patient
        Route::post('/v1/patient/save-medicine', 'V1\apiController@SaveMedicine');
        // this is for madicine list for patient
        Route::get('/v1/patient/tests-list', 'V1\apiController@testsList');
        // this is for madicine list for patient
        Route::post('/v1/patient/save-test', 'V1\apiController@saveTests');		
		// this is for book appointment
        Route::post('/v1/patient/book-appointment', 'V1\apiController@CreateAppointment');		
		// this is for appointment and reminder list
        Route::get('/v1/patient/get-reminder-list', 'V1\apiController@GetReminderList');

        // this is for events , blogs and banner list
        Route::get('/v1/doctor/get-home-content-list', 'V1\apiController@GetHomePageContentList');

        // this is for events , blogs and banner list
        Route::get('/v1/patient/logout', 'V1\apiController@patientLogout');

        
});
// end here

