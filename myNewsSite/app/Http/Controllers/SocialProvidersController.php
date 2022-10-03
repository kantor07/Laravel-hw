<?php

namespace App\Http\Controllers;

use App\Services\Contracts\Social;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Foundation\Application;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;


class SocialProvidersController extends Controller
{
    public function redirect(string $driver): SymfonyRedirectResponse | RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social): Redirector | Application | RedirectResponse
    {
        return redirect(
            $social->loginAndGetRedirectUrl(
            Socialite::driver($driver)->user())
        );
    }
}
