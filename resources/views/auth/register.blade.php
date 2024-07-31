<x-layouts.auth>

    <x-slot:image>
        <img src="/assets/background/register.svg" alt="" class="max-h-[86svh] w-full">
    </x-slot>

    <form action="{{ route('register.manage') }}" method="POST">
        @csrf

        <div class="mb-7">
            <h4 class="font-extrabold text-slate-700">Sign Up</h4>
            <p class="text-sm mt-1">Enter your email and password to register</p>
        </div>

        <div class="mb-2">
            <x-forms.label for="name" value="Full Name" />
            <x-forms.input name="name" />
            <x-forms.error name="name" />
        </div>

        <div class="mb-2">
            <x-forms.label for="email" value="Email" />
            <x-forms.input name="email" />
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

        <div class="text-sm  mt-3">
            <x-forms.label for="remember_me" class="flex items-center gap-2">
                <x-forms.checkbox name="remember_me" />
                I agree the <a href="" class="text-java-500 hover:text-java-600">Terms and
                    Conditions</a>
            </x-forms.label>
        </div>

        <div class="mt-5">
            <button type="submit" class="form-btn w-full">Sign Up</button>
        </div>
    </form>

    <div class="mt-5">
        <p>Already have an account? <a href="{{ route('login') }}" class="text-java-500 hover:text-java-600 ms-2">Sign
                In</a></p>
    </div>

</x-layouts.auth>
