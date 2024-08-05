<x-layouts.auth>
    <x-slot:image>
        <img src="/assets/background/login.svg" alt="" class="h-[86svh] w-full">
    </x-slot>

    <form action="{{ route('authenticate') }}" method="POST">
        @csrf

        <div class="mb-7">
            <h4 class="font-extrabold text-slate-700">Sign In</h4>
            <p class="text-sm mt-1">Enter your email and password to sign in</p>
        </div>

        @session('status')
            <p class="text-sm text-green-500 my-2">{{ $value }}</p>
        @endsession

        <div class="mb-2">
            <x-forms.label for="email" value="Email" />
            <x-forms.input name="email" value="{{ old('email') }}" />
            <x-forms.error name="email" />
        </div>

        <div class="mb-2">
            <x-forms.label for="password" value="Password" />
            <x-forms.password name="password" />
            <x-forms.error name="password" />
        </div>

        <div class="text-sm flex mt-3">
            <div>
                <x-forms.label for="remember_me" class="flex items-center gap-2">
                    <x-forms.checkbox name="remember_me" :checked="old('remember_me')" />
                    Remember Me
                </x-forms.label>
            </div>

            <a href="{{ route('password.request') }}" class="text-java-500 hover:text-java-600 ms-auto">Forgot
                Password?</a>
        </div>

        <div class="mt-5">
            <button type="submit" class="form-btn w-full">Sign In</button>
        </div>
    </form>

    <div class="mt-5 flex items-center">
        <div class="border-b border-slate-300 flex-1"></div>
        <div class="text-sm mx-3">Or Sign in With</div>
        <div class="border-b border-slate-300 flex-1"></div>
    </div>

    <div class="mt-3 grid grid-cols-2 gap-5">
        <a href="{{ route('socialite.redirect', 'google') }}"
            class="py-2 px-7 text-java-500 font-semibold border border-java-500 inline-flex justify-center rounded-md hover:text-java-700 hover:border-java-700 hover:shadow">
            <svg class="size-5 me-2" viewBox="-0.5 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <title>Google-color</title>
                    <desc>Created with Sketch.</desc>
                    <defs> </defs>
                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Color-" transform="translate(-401.000000, -860.000000)">
                            <g id="Google" transform="translate(401.000000, 860.000000)">
                                <path
                                    d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24"
                                    id="Fill-1" fill="#FBBC05"> </path>
                                <path
                                    d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333"
                                    id="Fill-2" fill="#EB4335"> </path>
                                <path
                                    d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667"
                                    id="Fill-3" fill="#34A853"> </path>
                                <path
                                    d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24"
                                    id="Fill-4" fill="#4285F4"> </path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            Google</a>
        <a href="{{ route('socialite.redirect', 'facebook') }}"
            class="py-2 px-7 text-java-500 font-semibold border border-java-500 inline-flex justify-center rounded-md hover:text-java-700 hover:border-java-700 hover:shadow">
            <svg class="size-5 me-2" xmlns="http://www.w3.org/2000/svg" aria-label="Facebook" role="img"
                viewBox="0 0 512 512" fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <rect width="512" height="512" rx="15%" fill="#1877f2"></rect>
                    <path
                        d="M355.6 330l11.4-74h-71v-48c0-20.2 9.9-40 41.7-40H370v-63s-29.3-5-57.3-5c-58.5 0-96.7 35.4-96.7 99.6V256h-65v74h65v182h80V330h59.6z"
                        fill="#ffffff"></path>
                </g>
            </svg>
            Facebook</a>

    </div>

    <div class="mt-5">
        <p>Don't have an account? <a href="{{ route('register') }}" class="text-java-500 hover:text-java-600 ms-2">Sign
                Up</a></p>
    </div>


</x-layouts.auth>
