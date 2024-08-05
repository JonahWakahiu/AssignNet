<nav class="bg-white border-b relative border-slate-200 z-40" x-data="{ isOpen: false }">
    <div class="flex items-center  h-20 mx-2">

        <x-application-logo />



        <div class="hidden md:flex items-center gap-6 ms-auto text-slate-900 ">
            <x-navbar-link href="{{ route('home') }}" :active="request()->routeIs('home')" value="Home" />
            <x-navbar-link href="{{ route('about') }}" :active="request()->routeIs('about')" value="About" />
            <x-navbar-link href="{{ route('services') }}" :active="request()->routeIs('services')" value="Services" />
            <x-navbar-link href="{{ route('prices') }}" :active="request()->routeIs('prices')" value="Prices" />

            <a href="" @class(['font-semibold hover:text-tia-500'])>FAQs</a>
            <x-navbar-link href="{{ route('login') }}" :active="request()->routeIs('login')" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person size-5 stroke-2 me-1.5"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                </svg>
                Sign In
            </x-navbar-link>

            <a href="{{ route('order.step-one') }}"
                class="text-white text-sm bg-tia-700 rounded-md py-2 px-5 font-semibold hover:bg-tia-800">Order
                Now</a>

            {{-- mobile icon --}}
        </div>

        <button type="button"
            class="ms-auto md:hidden transition-all ease-in-out duration-300 bg-slate-200 rounded-md text-black p-1.5 shadow-md border border-slate-300"
            @click="isOpen = !isOpen">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
            </svg>
        </button>
    </div>


    <div x-cloak x-show="isOpen" x-collapse
        class="md:hidden w-full absoulte bottom-0 bg-transparent h-max py-2 z-50 border-t border-slate-300">
        <a href="{{ route('home') }}" @class([
            'block py-2 ps-3 text-sm font-semibold hover:bg-slate-200',
            'bg-tia-700 text-white' => request()->routeIs('home'),
        ])>Home</a>
        <a href="{{ route('about') }}" @class([
            'block py-2 ps-3 text-sm font-semibold hover:bg-slate-200',
            'bg-tia-700 text-white' => request()->routeIs('about'),
        ])>About</a>
        <a href="{{ route('services') }}" @class([
            'block py-2 ps-3 text-sm font-semibold hover:bg-slate-200',
            'bg-tia-700 text-white' => request()->routeIs('services'),
        ])>Services</a>
        <a href="{{ route('prices') }}" @class([
            'block py-2 ps-3 text-sm font-semibold hover:bg-slate-200',
            'bg-tia-700 text-white' => request()->routeIs('prices'),
        ])>Prices</a>
        <a href="" @class(['block py-2 ps-3 text-sm font-semibold hover:bg-slate-200'])>FAQ</a>
        <a href="{{ route('login') }}" @class([
            'block py-2 ps-3 text-sm font-semibold hover:bg-slate-200',
            'bg-tia-700 text-white' => request()->routeIs('login'),
        ])>Login</a>

    </div>



</nav>
