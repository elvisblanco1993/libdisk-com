<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

    class LoginController extends Controller
    {
        public function redirectToProvider($provider)
        {
            return Socialite::driver($provider)->redirect();
        }

        public function handleProviderCallback($provider)
        {
            $providerUser = Socialite::driver($provider)->user();

            $user = User::firstOrCreate(
                [
                    'provider' => $provider,
                    'provider_id' => $providerUser->getId()
                ],
                [
                    'name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
                ]
            );

            $user->update(['permissions' => ['read']]);

            auth()->login($user, true);

            return redirect()->route('dashboard');
        }
    }
