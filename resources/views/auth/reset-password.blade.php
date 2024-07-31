<x-layouts.auth>

    <x-slot:image>
        <img src="/assets/background/reset-password.svg" alt="" class="max-h-[86svh] w-full">
    </x-slot>

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <div class=" mb-10">
            <h4 class="font-extrabold text-slate-700">Reset Password</h4>
            <p class="text-sm mt-1">Your new password must be different from previous used password</p>
        </div>

        <input type="hidden" name="token" value="{{ $request->route('token') }}">


        <div class="mb-2">
            <x-forms.label for="email" value="Email" />
            <x-forms.input name="email" value="{{ old('email', $request->email) }}" />
            <x-forms.error name="email" />
        </div>

        <div class="mb-2">
            <x-forms.label for="password" value="Password" />
            <x-forms.password name="password" />
            <x-forms.error name="password" />
        </div>

        <div class="mb-2">
            <x-forms.label for="password_confirmation" value="Confirm Password" />
            <x-forms.password name="password_confirmation" />
            <x-forms.error name="password_confirmation" />
        </div>


        <div class="mt-5">
            <button type="submit" class="form-btn w-full">Reset Password</button>
        </div>
    </form>
</x-layouts.auth>
