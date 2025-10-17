<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    protected array $providers = [
        'github',
        'google',
        //'discord',
        'twitch',
        'twitter-oauth-2',
    ];

    /**
     * Redirect the user to the provider authentication page.
     */
    public function redirect(string $provider): RedirectResponse
    {
        $validator = Validator::make(['provider' => $provider], [
            'provider' => ['required', 'in:' . implode(',', $this->providers)],
        ]);

        if ($validator->fails()) {
            return redirect(route('login'))->withErrors($validator);
        }

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     */
    public function callback(string $provider): RedirectResponse
    {
        $validator = Validator::make(['provider' => $provider], [
            'provider' => ['required', 'in:' . implode(',', $this->providers)],
        ]);

        if ($validator->fails()) {
            return redirect(route('login'))->withErrors($validator);
        }

        $socialiteUser = Socialite::driver($provider)->user();

        $user = User::updateOrCreate(
            [
                'provider_id' => $socialiteUser->getId(),
                'provider' => $provider,
            ],
            [
                'name' => $socialiteUser->getName(),
                'email' => $socialiteUser->getEmail(),
                'email_verified_at' => now(),
                'provider_token' => $socialiteUser->token,
                'provider_avatar' => $socialiteUser->getAvatar(),
            ],
        );

        Auth::login($user, true);

        return redirect(route('cp.dashboard'));
    }
}