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


class ResetPasswordController extends Controller
{
    
	
	public function userResetPassword($token){
		
		if (empty($token)) { 
			return redirect('/access-denied');
		}
		$id = base64_decode($token);
		
		$User = User::where(['otp'=>$token,'id'=>$id])->first();	
		if($User){
			return view('front.auth.reset-password',compact('id'));
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
	
	
	
	
	
	
}