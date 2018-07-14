<?php

namespace App\Http\Controllers\V1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use Hash;
use DB;
use File;

class apiController extends Controller
{	
	 const VERIFIED = 1;
	const LOGINSTATUS = 1;
    const STATUS = 1;
      
    /**********
    *** Author : Ajay Kumar 
    *** Date : 13th March  2018
    *** Description : This API is used for check access_token valid or not
    *** Params : access_token 
    *** Return : true if access_token is valid.
    *********/
	
	public function validateAccessToken($access_token){
		try {
			$matchKeys = ['api_token' =>$access_token, 'status' => 1];
			$Access = User::where($matchKeys)->first();
			
			if($Access){
				return true;
			}else{
				return false; 
			}
		}catch(\Illuminate\Database\QueryException $e){
			
			$returnArr = array(
				'error'     =>  1,
				'message'   =>  'Oops ! some thing is wrong.',
				'reason'      =>  $e->getMessage(),
				'status'    =>  200
			);
			
		}
		return json_encode($returnArr); die;
	}


	
	public function register(Request $request){
		$returnArr = array();
		$ErrorTxt = '';
		$validation = Validator::make($request->all(), [
			//'accessToken'  => 'required',
            'name'      => 'required',
            'number'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required'
        ]);
		if ($validation->fails()) {
            foreach($validation->errors()->all() as $error){ 
                $ErrorTxt .= $error.',';
            }
            $returnArr = array(
                'error'     =>  1,
                'message'   =>  'validation failed',
                'reason'      =>  trim($ErrorTxt,','),
                'status'    =>  200
            );
        }else{
				try{
					$isValid = $this->validateAccessToken($request->accessToken);
					if($isValid){
						DB::beginTransaction();
						$User = new User();
						$User->name = $request->name;
						$User->number = $request->number;
						$User->email = $request->email;
						$User->password =bcrypt($request->password);
						$User->save();
						$returnArr = array(
							'error'     =>  0,
							'message'   =>  'User registration has been successfully done.',
							'data'      =>  $User,                       
							'status'    =>  200
						);
						DB::commit();
					}else{
						$returnArr = array(
							'error'     =>  1,
							'message'   =>  'accessToken does not valid.',
							'reason'      =>  'accessToken session has been expired or invalid.',
							'status'    =>  422
						); 
					}	
			}catch(\Illuminate\Database\QueryException $e){
                $returnArr = array(
                    'error'     =>  1,
                    'message'   =>  'Oops ! some thing is wrong.',
                    'reason'      =>  $e->getMessage(),
                    'status'    =>  200
                );
                DB::rollBack();
			}
		}
		return json_encode($returnArr);
	}
	
	public function login(Request $request){
		$returnArr = array();
		$ErrorTxt = '';
		$messages = [
			'email.required' => 'Please enter your email or mobile!',
			'password.required'  => 'Please enter your password!'
		];
		$validation = Validator::make($request->all(), [            
            'email' => 'required',
            'password'  => 'required',            
        ],$messages);
		if ($validation->fails()) { 
            foreach($validation->errors()->all() as $error){ 
                $ErrorTxt .= $error.',';
            }
            $returnArr = array(
                'error'     =>  1,
                'message'   =>  'validation failed',
                'reason'    =>  trim($ErrorTxt,','),
                'status'    =>  400
            );
		}else{
			try{
				$isValid = $this->validateAccessToken($request->accessToken);
				
				if($isValid){
			
				if (is_numeric($request->login_email))
				{			
					$field=['number'=>$request->email,'password'=>$request->password];
				}else{
					$field = ['email'=>$request->email,'password'=>$request->password];					
				}
				if(Auth::attempt($field,$request->stayLogged)) {
					$returnArr = array(
						'error'     =>  0,
						'message'   =>  'User logged in successfully.',
						'data'      =>  $field,                       
						'status'    =>  200
					);
				}else{
					$returnArr = array(
						'error'     =>  1,
						'message'   =>  'These credentials do not match our records.',
						'reason'    =>  'Please Verify Your Email Address And Password.',
						'status'    =>  190
					);
				} 
			}else{
				$returnArr = array(
					'error'     =>  1,
					'message'   =>  'accessToken does not valid.',
					'reason'      =>  'accessToken session has been expired or invalid.',
					'status'    =>  422
				); 
			}
				
			}catch(\Illuminate\Database\QueryException $e){
                $returnArr = array(
                    'error'     =>  1,
                    'message'   =>  'Oops ! some thing is wrong.',
                    'reason'      =>  $e->getMessage(),
                    'status'    =>  200
                );
               
			}
		}
		return json_encode($returnArr);	
			
	}
	
	
	
	
	public function banner(Request $request){
		$returnArr = array();
		$ErrorTxt = '';
		$validation = Validator::make($request->all(), [
            'name'          => 'required',
            'description'   => 'required',
            'price'    	    => 'required',
            'size'      => 'required'
        ]);
		if ($validation->fails()) {
            foreach($validation->errors()->all() as $error){ 
                $ErrorTxt .= $error.',';
            }
            $returnArr = array(
                'error'     =>  1,
                'message'   =>  'validation failed',
                'reason'      =>  trim($ErrorTxt,','),
                'status'    =>  200
            );
        }
	
   
}
}