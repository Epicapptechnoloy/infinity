<?php
namespace App;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\User;
class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        /*
		$account = User::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
		*/	
		$account = User::whereEmail($providerUser->getEmail())->whereProvider('facebook')->whereProviderUserId($providerUser->getId())->first();
		
        if ($account) {
            return $account;
        } else {

            $account = new User([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook',
				'email' => $providerUser->getEmail(),
				'name' => $providerUser->getName()
            ]);

            /*$user = User::whereEmail($providerUser->getEmail())->first();

				if (!$user) {

					$user = User::create([
						'email' => $providerUser->getEmail(),
						'name' => $providerUser->getName(),
					]);
				}
			*/
            //$account->user()->associate($user);
            $account->save();

            return $account;

        }

    }
}