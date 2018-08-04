<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Socialite;

class AuthController extends Controller
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

    public function redirectToGoogle()
    {
		//dd(Socialite::driver('facebook')->redirect());
        return Socialite::driver('google')->redirect();
    }
	
	
	public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('auth/google');
        }
        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->route('home');
    }

	
	
    private function findOrCreateUser($googleUser)
    {
        $authUser = User::where('google_id', $googleUser->id)->first();

        if ($authUser){
            return $authUser;
        }

        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'oauth_provider' => $googleUser->avatar
        ]);
    }
	
	
	
}
