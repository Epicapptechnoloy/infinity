<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use DB;
use App\Model\Admin;
use Auth;
use Hash;
use Session;
use Carbon;
use Validator;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    //use SendsPasswordResetEmails;

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
    ***Author       : Rajiv kumasr
    ***Action       : forgot-password
    ***Description  : This action is used for show the forgot password form and process
    ***Date         : 29-12-2017
    ***Params       : null
    ***return       : @return \Illuminate\Http\Response
    *************/
    public function forgotPasswordForm(Request $request){
        $homeTitle = "Infinity | Forgot password";
        return view('admin.passwords.email',array('homeTitle'=>$homeTitle));
    }
    
     /***********
    ***Author       : Rajiv Kumar
    ***Action       : resetPasswordEmail
    ***Description  : This action is used for show the forgot password form and process
    ***Date         : 28-12-2017
    ***Params       : null
    ***return       : @return \Illuminate\Http\Response
    *************/
    public function resetPasswordEmail(Request $request){
		//dd($request->all());
        $homeTitle = "Infinity | Forgot password";
        
        $this->validate($request, [
            'email'           => 'required|email',            
        ]);
        
       $admin = Admin::where('email',$request->email) -> first();   
       
       if($admin){
            DB::beginTransaction();
                try {					
						$adm = Admin::findOrFail($admin->id);
						//dd($adm);
                        $rand = substr(uniqid('', true), -6);
						//dd($rand);
						//$user->password = Hash::make($rand);
						$randomstring = str_random(15);
						//dd($randomstring);
						$adm->reset_password_token  = $randomstring;  
						//dd($adm);
						if($adm->save()){  
						   DB::commit();        
							\Session::flash('success','Your Reset Password Link has been sent on your email.');
							$reset_link = \URL::to('/admin/new-password/'.base64_encode($admin->id).'/'.base64_encode($randomstring));
							/***********Email sent to reset password******/
							Mail::send('admin.passwords.forgotpassword', ['user' => $admin,'reset_link'=>$reset_link], function($message) use($admin)
							{
								$message->to(trim($admin->email), 'Infinity')->subject('Forgot password!');
							});
                        }
						else{
							return back()->withErrors([$e->getMessage()]);
						}
                        //send email end here
                        return back()->withErrors('success','Your Reset Password Link has been sent on your email.');
                      /*************end here*********************/
                    }
                    catch (\Exception $e){                    
                        return back()->withErrors([$e->getMessage()]);
                            DB::rollBack();
                    }            
        }else{
            return back()->withInput($request->input())->withErrors(['Email not found.']);
        }
    }      
    
}
