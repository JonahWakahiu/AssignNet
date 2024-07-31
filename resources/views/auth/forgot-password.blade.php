<x-layouts.auth>
    <x-slot:image>
        <img src="/assets/background/forgot-password.svg" alt="" class="h-[86svh] w-full">
    </x-slot>

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <div class="mb-10">
            <h4 class="font-extrabold text-slate-700">Forgot Password</h4>
            <p class="text-sm mt-1">Enter the email address you used when you joined and we will send instructions to
                reset your password</p>
        </div>

        @session('status')
            <p class="text-sm text-green-500 my-2">{{ $value }}</p>
        @endsession

        <div class="mb-2">
            <x-forms.label for="email" value="Email" />
            <x-forms.input name="email" />
            <x-forms.error name="email" />
        </div>

        <div class="mt-5">
            <button type="submit" class="form-btn w-full">Request Password Reset</button>
        </div>
    </form>
</x-layouts.auth>
