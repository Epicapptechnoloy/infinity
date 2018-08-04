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


class ForgetPasswordController extends Controller
{
    
	
	public function forgotPasswordProcess(Request $request){
		
		$validation = Validator::make($request->all(), [            
			'emai11' => 'required',			
		]);
		
		if ($validation->fails()) { 
			return redirect()->back()->withErrors($validation)->withInput($request->all());
		}
		
		try {
			DB::beginTransaction();
			$UserDetails = User::where('email',$request->emai11)->first();
		
			if($UserDetails){
				$string = base64_encode($UserDetails->id);
				
				$UserDetails->otp = $string;
				$UserDetails->update();
				DB::commit();
				echo $link = "http://infinity.com/resetPassword/$string"; die;
				/* link will sent to user email */
			}else{
				return redirect('forgot-password')->withErrors([
						'emai11' => 'Email do not match with our records.',
				])->withInput($request->all());
			}
			
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return redirect()->back()->withErrors([$e->getMessage()])->withInput($request->all());
		}
	} 	
	
	
	
	
}