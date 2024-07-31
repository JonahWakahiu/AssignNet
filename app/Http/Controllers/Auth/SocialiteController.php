<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect(string $provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider): RedirectResponse
    {
        $response = Socialite::driver($provider)->user();

        $user = User::firstOrCreate(
            ['email' => $response->email],
            [
                'name' => $response->name ?? $response->nickname,
                'password' => Str::password(8),
                $provider . '_id' => $response->id
            ]
        );

        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
