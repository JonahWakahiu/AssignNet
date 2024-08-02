<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class LoginRegisterController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember_me)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'We could not find the provided details in our records'])->onlyInput('email');
    }

    public function manageRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|string|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->symbols()],
        ]);

        $role_id = Role::where('name', 'user')->first()->pluck('id');

        try {
            $user = User::create($validated);
            $user->roles()->sync($role_id);

            Auth::login($user);
            event(new Registered($user));

            return redirect()->route('verification.notice');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
