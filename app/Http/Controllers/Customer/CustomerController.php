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
	
	/**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
    */
    protected function guard() {
        return Auth::guard('frontUser');
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