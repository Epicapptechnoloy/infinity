<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Model\Countries;
use App\Model\States;
use DB;
use Crypt;
use Hash;
use Session;
use App\Helpers\Helpers;
use App\Http\Requests;
use App\Model\User;

class AjaxController extends Controller
{	
	
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
					
					case 'validateEmail':
					
						$userEmail=$request->email;
						
						$response = User::where('email',$userEmail)->first();
						if ($response) {
							$returnArr = array("*Email already exists");
						} else {
							$returnArr = true;
						}
						break;    

					case 'validateEmailForgotPwd':
					
						$userEmail=$request->emai11;
					
						$response = User::where('email',$userEmail)->first();
						
						if ($response) {
							$returnArr = true;
						} else {
							$returnArr = array("*Email do not match with our records.");
							
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
	
	
	public function getStateList(Request $request){
		
		$validation = Validator::make($request->all(), [
			'country_id'   => 'required'
		]);
		
		if ($validation->fails()) { 
           return json_encode($request->all());die;    
        }else{
			$stateList=States::where(['country_id'=>$request->country_id,'status'=>1])->get();
			
			return json_encode($stateList); die;  
		}
    }
	
	
}
