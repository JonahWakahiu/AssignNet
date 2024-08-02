<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile(): View
    {
        return view('backend.profile.index');
    }

    public function manageProfile(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('profile', [
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|email',
            'your_location' => 'nullable|string',
            'phone_number' => 'nullable|integer',
            'birth_date' => 'nullable',
            'language' => 'nullable',
            'profile_image' => 'image',
        ]);

        $user = $request->user();

        try {
            DB::beginTransaction();
            if ($request->hasFile('profile_image')) {
                $path = $request->file('profile_image')->store('avatars', 'public');
                $validated['profile_image'] = $path;
            }

            $user->fill($validated)->save();
            DB::commit();
            return back()->with('status', 'profile-saved');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function managePassword(Request $request)
    {
        $validated = $request->validateWithBag('password', [
            'current_password' => 'required|current_password',
            'password' => ['required', 'confirmed', Password::min(8)->symbols()->letters()],
        ]);

        $user = Auth::user();
        try {
            $user->forceFill([
                'password' => Hash::make($validated['password']),
            ]);
            $user->save();

            return back()->with('status', 'password-saved');

        } catch (\Throwable $th) {
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function deleteUser()
    {
        $user = Auth::user();
    }
}
