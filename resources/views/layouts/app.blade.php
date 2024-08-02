<x-layout>
    <main class="flex min-h-screen" x-data="{ sidebarOpen: true }">
        @include('layouts.dashboard.sidebar')

        <section class="flex-1">
            @include('layouts.dashboard.navigation')

            <section class="p-5">
                {{ $slot }}
            </section>
        </section>
    </main>

</x-layout>
