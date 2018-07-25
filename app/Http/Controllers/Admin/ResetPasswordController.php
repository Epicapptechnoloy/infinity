<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB;
use App\Model\Admin;
use Auth;
use Hash;
use Session;
use Carbon;
use Validator;
use Mail;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

   // use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    
    /***********
    ***Author       : Ajay Kumar
    ***Action       : newPassword
    ***Description  : This action is used for enter new password for reset password
    ***Date         : 14-07-2018
    ***Params       : null
    ***return       : @return \Illuminate\Http\Response
    *************/
    public function newPassword(Request $request){
		
         $homeTitle = "Infinity | New password";
         $admin = Admin::where('reset_password_token',base64_decode($request->resettoken))->where('id',base64_decode($request->id))-> first();
         if($admin){
				return view('admin.passwords.new-password',['homeTitle'=>$homeTitle,'admin'=>$admin,'request'=>$request]);
		 }else{
			return response()->json(['Link has expired!'], 404); 
		}
        
    }
    /***********
    ***Author       : Ajay Kumar
    ***Action       : updatePassword
    ***Description  : This action is used for update the reset password
    ***Date         : 14-07-2018
    ***Params       : null
    ***return       : @return \Illuminate\Http\Response
    *************/
    public function updatePassword(Request $request){
		
        $homeTitle = "Infinity | New password";
		   $validation = Validator::make($request->all(), [            
				'password'  => 'required|min:6|confirmed',            
			]);
			if ($validation->fails()){ 
				return redirect()->back()->withErrors($validation);   
			} 
        $admin = Admin::where('reset_password_token',base64_decode($request->resettoken))->where('id',base64_decode($request->userid))-> first();
        if($admin){			 
				$newPass = Admin::findOrFail($admin->id);
				$newPass->password = Hash::make($request->password);
				$newPass->reset_password_token  = '';
				$newPass->save();
			\Session::flash('success','Your password has been updated successfully. Please login');
			 return redirect()->route('admin');
		}else{
			return response()->json(['Link has expired!'], 404); 
		}
        
    }
}
