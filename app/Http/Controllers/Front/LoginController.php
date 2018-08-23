<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use App\Model\User;
use App\Model\Address;
use Socialite;
use DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Contracts\Auth\Authenticatable;

class LoginController extends Controller
{
    //
	
	/**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
	public function login()
    {
        $homeTitle = 'Login | Infinity';
        return view('front.auth.login',array('homeTitle'=>$homeTitle));
    }
	
	
	
	public function loginProcess(Request $request) {
	
        $returnArr = array();
        $ErrorTxt = '';
		
        $validation = Validator::make($request->all(), [
            'username'     => 'required',
            'password'     => 'required',
            
        ]);
    
        if ($validation->fails()) { 
            foreach($validation->errors()->all() as $error){ 
                $ErrorTxt .= $error.',';
            }
            $returnArr = array(
                'error'     =>  1,
                'message'   =>  'validation failed',
                'reason'      =>  trim($ErrorTxt,','),
                'status'    =>  400
            );
        }else{
			
			try{
				$username= $request->username;
				$password= $request->password;
				if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
					$key = "email";
				}else{
					$key = "number";
				}
				
				$userObj = User::where($key,$username)->first();
				
				if($userObj){
					if($userObj->email_verify_status){
						
						if (Auth::guard('frontUser')->attempt(array($key => $username, 'password' => $password))) {
							
							$userObj->lastlogin = date('Y-m-d H:i:s');
							$userObj->save();
							
							$returnArr = array(
								'error'     =>  0,
								'message'   =>  '*Login successfully.',
								'status'    =>  200
							);
						}else{
							$returnArr = array(
								'error'     =>  1,
								'message'   =>  '*Login failed due to invalid credentials.',
								'status'    =>  2
							); 
						}
					}else{
						$returnArr = array(
							'error'     =>  1,
							'message'   =>  '*Login failed due to email is not verified.',
							'status'    =>  2
						); 
					}
					
				}else{
					$returnArr = array(
						'error'     =>  1,
						'message'   =>  '*Login failed due to invalid credentials.',
						'status'    =>  2
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
			return json_encode($returnArr);
        }
    }
	
	
	/**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {
		
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->intended(url('/'));
    }
	
	/**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
    */
    protected function guard() {
        return Auth::guard('frontUser');
    }
	
	public function signupProcess(Request $request){
	
		$validation = Validator::make($request->all(), [
			'first_name'   	=> 'required',
			'last_name'   	=> 'required',
            'email' 		=> 'required|email|unique:users',
            'password'     	=> 'required|confirmed',
			'number'   	=> 'required',
			'gender'   	=> 'required',
			
        ]);
		
        if ($validation->fails()) { 
	
           return redirect()->back()->withErrors($validation)->withInput($request->all());    
        }
			
		try{
		
			DB::beginTransaction();
			$User = User::create([
			
				'first_name' 	=> $request->first_name,
				'last_name' 	=> $request->last_name,
				'email' 	=> $request->email,
				'password' 	=> bcrypt($request->password),
				'pass' 	=>$request->password,
				'number' 	=> $request->number,
				'gender' 	=> $request->gender,
				
			]);
			
			
			DB::commit();
			
		
			/* $subject = 'Email Verification FGC ESPORTS Arena';
			$activationKey = base64_encode($User->user_id . '@' . $random = mt_rand(10000000, 99999999));
			$verificationLink = env('APP_URL'). '/verify-email/' . $activationKey;
			
			$client = new PostmarkClient(Config::get('constants.PostMarkKey'));
			
			$client->sendEmailWithTemplate(
				Config::get('constants.SupportMail'),
				$request->email,
				Config::get('constants.PostMarkTemplateId.verify_email_template'), 
				[
					"subject" => $subject,
					"username" => $request->username,
					"verification_link" => $verificationLink,
				] 
			); 
			
			$message="Registration Successfully Done.";
			Session::put('message', $message);
			Session::put('redirect','HomePage');
			Session::put('link_text','Go To Home');*/
			return redirect()->intended(route('success'));
			//return redirect()->intended(url('/'));
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return redirect()->back()->withErrors(['Oops ! some thing is wrong.'])->withInput($request->all());
		}
    }
	
	
	public function ajaxhandlerAction(Request $request) {
		
        $returnArr = array();
        $ErrorTxt = '';
		
        $validation = Validator::make($request->all(), [
            'ajaxMethod'     => 'required',
        ]);
        
        if ($validation->fails()) { 
            foreach($validation->errors()->all() as $error){ 
                $ErrorTxt .= $error.',';
            }
            $returnArr = array(
                'error'     =>  1,
                'message'   =>  'validation failed',
                'reason'      =>  trim($ErrorTxt,','),
                'status'    =>  400
            );
        }else{
			try{
				
				$ajaxMethod=$request->ajaxMethod;
			
					
				switch ($ajaxMethod) {
					
					
					case 'validateOldpass':
					   
						$userId = \Auth::guard('frontUser')->user()->id;
						$User = User::find($userId);
						if($User->pass == $request->oldpassword){
							$returnArr = true;
						}else{
							$returnArr = false;
						}
						break;
						
					case 'validateEmail':
					
						$userEmail=$request->email;
						
						$response = User::where('email',$userEmail)->first();
						if ($response) {
							$returnArr = array("*Email already exists");
						} else {
							$returnArr = true;
						}
						break;     
				}
				
			}catch(\Illuminate\Database\QueryException $e){
                
                $returnArr = array(
                    'error'     =>  1,
                    'message'   =>  'Oops ! some thing is wrong.',
                    'reason'      =>  $e->getMessage(),
                    'status'    =>  200
                );
                
            }
			
			return json_encode($returnArr);
			
        }
    }
	
	
	
	
	
	
}