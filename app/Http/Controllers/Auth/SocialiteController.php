<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\UserMeta;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($provider)
    {
        try {

            $socialiteUser  = $this->getSocialiteUser($provider);
            $provider_id = UserMeta::where('provider_id', $socialiteUser->getId())->first();

            $existUser = $provider_id != null ? User::find($provider_id->metaable_id) : false;

            if ($existUser) {

                Auth::login($existUser, true);
                $existUser->metas->update([
                    'last_login_at' => now(),
                ]);

                return redirect()->route('site.index')->with('success', 'با موفقیت وارد شدید');
            } else {
                $newUser = User::create([
                    'username' => $socialiteUser->getNickname(),
                    'email' => $socialiteUser->getEmail(),
                    'password' => '12344321',
                ]);
                $newUser->metas->update([
                    'last_login_at' => now(),
                    'register_at' => now(),
                    'email_verified_at' => now(),
                    'provider' => $provider,
                    'provider_id' => $socialiteUser->getId(),
                    'provider_token' => $socialiteUser->token,
                    'provider_refresh_token' => $socialiteUser->refreshToken,
                ]);
                $newUser->profile->update([
                    'fname' =>  $socialiteUser->getName(),
                    'github' =>  $socialiteUser->getNickname(),
                    'bio' =>  $socialiteUser->user['bio'],
                    'twitter' =>  $socialiteUser->user['twitter_username'],
                    'avatar_path' => $socialiteUser->getAvatar() ?? '',
                ]);

                Auth::login($newUser, true);

                return redirect()->route('site.index');
            }
        } catch (Exception $exc) {
            dd($exc->getMessage());
        }
    }

    function createUser($socialiteUser, $provider)
    {

        $user = User::where('provider_id', $socialiteUser->id)->first();

        if (!$user) {
            $newUser = User::create([
                'username' => $socialiteUser->getNickname(),
                'email' => $socialiteUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialiteUser->getId(),
                'password' => '12344321',
            ]);
        }
        return $user;
    }


    private function getSocialiteUser($provider)
    {
        return Socialite::driver($provider)->user();
    }
}
