<?php

namespace App\Http\Controllers\Customer;

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

class CustomerController extends Controller
{
    //
	
	/**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
	public function showLoginForm()
    {
        $homeTitle = 'Login';
        return view('customer.AuthProcess',array('homeTitle'=>$homeTitle));
    }
	
	public function ProcessLogin(Request $request){
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
				/* link will sent to user email */
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
	 */
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
	
	
	
	
	
	
	
	
	
}