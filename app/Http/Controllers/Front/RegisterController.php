<?php
namespace App\Http\Controllers\Front;

use Postmark\PostmarkClient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
use Config;
use DB;
use Crypt;
use Hash;
use Session;
use carbon\Carbon;
use App\Model\User;
use App\Model\Front\UsersInfo;
use App\Model\Front\Countries;
use App\Helpers\Helpers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
       $this->middleware('auth', ['except' => ['signup', 'signupProcess']]); 
    }
   
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
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
			$user = new User();
			$user->first_name  = $request->first_name;
			$user->name  = $request->first_name;
			$user->last_name  = $request->last_name;
			$user->email = $request->email;
			$user->number = $request->number;
			$user->password = bcrypt($request->password );
			$user->remember_token = $request->_token;
			$user->email_verify_status = 1;
			$user->save();
			
			/* $subject = 'Email Verification Infinity';
			$activationKey = base64_encode($user->id . '@' . $random = mt_rand(10000000, 99999999));
			$verificationLink = env('APP_URL'). '/verify-email/' . $activationKey;
			
			$client = new PostmarkClient(Config::get('constants.PostMarkKey'));
			
			$client->sendEmailWithTemplate(
				Config::get('constants.SupportMail'),
				$request->email,
				Config::get('constants.PostMarkTemplateId.verify_email_template'), 
				[
					"subject" => $subject,
					"name" => $request->first_name,
					"verification_link" => $verificationLink,
				] 
			);  */
			
		 	$message="Registration Successfully Done. Verification Link has been sent to your email.Please Verify Your Email <br> Thanks.";
			Session::put('message', $message);
			Session::put('redirect','home');
			Session::put('link_text','Go To Home'); 
			return redirect()->intended(route('success'));
			
		}catch(\Illuminate\Database\QueryException $e){
			DB::rollBack();
			return redirect()->back()->withErrors(['Oops ! some thing is wrong.'])->withInput($request->all());
		}
    }
    
 }
