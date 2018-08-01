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
		/* $userObj = User::where('id',Auth::guard('frontUser')->user()->id)->first();
		$userObj->save(); */
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
		//dd($request->all());
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
	
	
	
	
	
	/* public function ProcessLogin(Request $request){
		$messages = [
			'login_email.required' => 'Please enter your email or mobile!',
			'login_pass.required'  => 'Please enter your password!'
		];
		$validation = Validator::make($request->all(), [            
            'login_email' => 'required',
            'login_pass'  => 'required',            
        ],$messages);
        if ($validation->fails()) {
            return redirect('/auth-process')->withErrors($validation)->withInput($request->all());   
        }
		$field = '';
		if (is_numeric($request->login_email))
		{			
			$field=['number'=>$request->login_email,'password'=>$request->login_pass];
		}else{
			$field = ['email'=>$request->login_email,'password'=>$request->login_pass];					
		}
		if(Auth::attempt($field,$request->stayLogged)) {
			return redirect('/');
		} 
		return redirect('/auth-process')->withErrors([
			'login_pass' => 'These credentials do not match our records.',
		])->withInput($request->all());
	}
	public function logout(){
		Auth::logout();
		return redirect('/');
	}
	
    public function ProcessRegistration(Request $request){
		 $validation = Validator::make($request->all(), [            
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'number' => 'required|min:11|numeric|unique:users',
            'password' => 'required|confirmed',
        ]);
        if ($validation->fails()) { 
            return redirect('/register')->withErrors($validation)->withInput($request->all());
        }
		try {
			DB::beginTransaction();
			$User = new User();
			$User->name = $request->name;
			$User->email = $request->email;
			$User->number = $request->number;
			$User->password = bcrypt($request->password);
			$User->status =1;
			$User->save();					
			DB::commit();
			$request->session()->withsuccess('Your registretion has been successfully');
			return redirect('/');
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return redirect()->back()->withErrors([$e->getMessage()])->withInput($request->all());
		} 
    }
		
		
	public function postResetLinkEmail(Request $request){
		$validation = Validator::make($request->all(), [            
			'email' => 'required',			
		]);
		
		if ($validation->fails()) { 
			return redirect('/forgotpassword')->withErrors($validation)->withInput($request->all());
		}
		try {
			DB::beginTransaction();
			$UserDetails = User::where('email',$request->email)->first();
			if($UserDetails){
				$string = base64_encode($UserDetails->id);
				//dd($UserDetails );
				$UserDetails->otp = $string;
				$UserDetails->update();
				DB::commit();
				echo $link = "http://raascals.com/reset-password/$string"; die;
				/* link will sent to user email 
			}else{
				return redirect('/forgotpassword')->withErrors([
						'email' => 'Email do not match with our records.',
				])->withInput($request->all());
			}
			
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return redirect()->back()->withErrors([$e->getMessage()])->withInput($request->all());
		}
	} 	
	
	
	public function resetPassword($token){
		
		if (empty($token)) { 
			return redirect('/access-denied');
		}
		$id = base64_decode($token);
		$User = User::where(['otp'=>$token,'id'=>$id])->first();	
		if($User){
			return view('customer.reset-password',compact('id'));
		}else{
			return redirect('/access-denied');
		}
	}
	
	
	public function proccessResetPassword(Request $request){
		$validation = Validator::make($request->all(), [            
			'password' => 'required|confirmed',			
		]);
		if ($validation->fails()) { 
			return redirect()->back()->withErrors($validation)->withInput($request->all());
		}
		try {
			DB::beginTransaction();
			if($request->id){
				$User = User::where('id',$request->id)->first();
				$User->id = $request->id;
				$User->otp = '';
				$User->password = bcrypt($request->password);
				$User->update();
				DB::commit();
				return redirect('/success');	
			}else{
			return redirect('/error');
				
			}
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return redirect()->back()->withErrors([$e->getMessage()])->withInput($request->all());
		}
	} 			

	
	public function showAccount(Request $request)
    {
        $homeTitle = 'Accountpage';
		$id=Auth::User()->id;
		$UserDetails= User::where('id',$id)->first();
		
		$Address = new Address;
		$addressdata = $Address->getAddressDetails();
		//dd($addressdata);
        return view('customer.account-page',compact('UserDetails','addressdata'));
    }
	
	/* public function processAccount(Request $request){
		$validation = Validator::make($request->all(), [            
            'old_password' 	=> 'required',
            'password' 	=> 'required|confirmed',
        ]);
        if ($validation->fails()) { 
            return redirect('/account')->withErrors($validation)->withInput($request->all());
        }try {
			DB::beginTransaction();
			if($request->id){
				$User = User::where('id',$request->id)->first();
				$User->id = $request->id;
				//$User->name = $request->name;
				if ($request->password) {
					if(Hash::check($request->old_password, $User->password)){
						$User->password = Hash::make($request->password);
					}else{
						return redirect()->back()->witherror('Your current password is Incorrect');
					}
				}
				$User->save();
				DB::commit();
				return redirect()->back()->withsuccess('Your profile  has been updated successfully');
			}else{
				return redirect('/error');
			}
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return redirect()->back()->withErrors([$e->getMessage()])->withInput($request->all());
		}
	}
	 
	public function changePassword(Request $request){
		
		$validation = Validator::make($request->all(), [
            'old_password' 	=> 'required',
            'password' 	=> 'required|confirmed',
        ]);
		$ErrorTxt='';
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
			try {
				DB::beginTransaction();
				if($request->id){
					$User = User::where('id',$request->id)->first();
					$User->id = $request->id;
					if ($request->password) {
						if(Hash::check($request->old_password, $User->password)){
						$User->password = Hash::make($request->password);
						}else{
						return redirect()->back()->witherror('Your current password is Incorrect');
						}
					}
					$User->save();
				
					$returnArr = array(
						'error'     =>  0,
						'message'   =>  'Updated.',
						'password'    	=> $User->password,
						'status'    =>  200
					);
				}else{
					 $returnArr = array(
						'error'     =>  1,
						'message'   =>  'error',
						'reason'    =>  trim($ErrorTxt,','),
						'status'    =>  400
					);
				}
				
				
					DB::commit();
			}catch(\Illuminate\Database\QueryException $e){
				DB::rollBack();
				$returnArr = array(
					'error'     =>  1,
					'message'   =>  'Oops ! some thing is wrong.',
					'reason'    =>  $e->getMessage(),
					'status'    =>  200
				);
				
			}
		}
		return json_encode($returnArr); die;
	}
	 
	
	
	public function processAddress(Request $request){
		$validation = Validator::make($request->all(), [            
            'name' 	=> 'required',
            'number' 	=> 'required',
            'address' 	=> 'required',
            'landmark' 	=> 'required',
            'country' 	=> 'required',
            'state' 	=> 'required',
            'city' 		=> 'required',
            'postcode' 	=> 'required',
        ]);
		
		if ($validation->fails()) { 
            return redirect('/account')->withErrors($validation)->withInput($request->all());
		}try {
			DB::beginTransaction();
			if($request->id){
				$User = User::where('id',$request->id)->first();
				$Address = new Address();
				$Address->user_id = $request->id;
				$Address->name = $request->name;
				$Address->number = $request->number;
				$Address->address = $request->address;
				$Address->landmark = $request->landmark;
				$Address->country_id = $request->country;
				$Address->state_id = $request->state;
				$Address->city = $request->city;
				$Address->postcode = $request->postcode;
				$Address->save();					
				DB::commit();
				return redirect('/address');
			}else{
				return redirect('/error');
			}
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return redirect()->back()->withErrors([$e->getMessage()])->withInput($request->all());
		}	
	}
	
	
	
	 */
	
	
	
	
	
}