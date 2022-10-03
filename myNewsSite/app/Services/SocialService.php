<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Social;
use App\Models\User;
use Laravel\Socialite\Contracts\User as SocialUser;
use Illuminate\Support\Facades\Auth;

class SocialService implements Social
{
    public function loginAndGetRedirectUrl(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();
        if ($user === null) {
            return route ('autch.register');
        }

        $user->name = $socialUser->getName();
        $user->name = $socialUser->getAvatar();

        if ($user->save()) {
            Auth::loginUsingId($user->id);

            return route('account');
        }

        throw new \Exception("Did not save user");
    }
}
