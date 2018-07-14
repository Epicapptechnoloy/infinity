<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Crypt;
use Hash;
use Session;
use carbon\Carbon;
use App\Model\Admin;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest:admin')->except('logout');
    }

     /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $homeTitle = 'Admin Login';
        return view('admin.login',array('homeTitle'=>$homeTitle));
    }

    /**
     * Login the doctor to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function login(Request $request){ 
       //validate the admin login form
       $validation = Validator::make($request->all(), [            
            'email'     => 'required|email',
            'password'  => 'required|min:5',            
        ]);
        //
        
        if ($validation->fails()) { 
            return redirect()->back()->withErrors($validation)->withInput($request->only('email', 'remember'));   
        } 
        //
        $admin = Admin::Where('email',$request->email)->first();
      
        if($admin){
            if (Hash::check($request->password, $admin->password)) {
                Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
                    Session::put('admin', $admin);
                return redirect()->intended(route('admin.home'));
            }else{
                return redirect()->back()->withErrors(['Wrong password.'])->withInput($request->only('email', 'remember')); 
            }
        }
        

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
       
    }
    

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/admin');
    }
    
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
