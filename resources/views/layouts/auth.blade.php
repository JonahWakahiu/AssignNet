<x-layout>
    @include('layouts.main-navigation')
    <section class="grid grid-cols-2 min-h-screen px-14 py-10">
        <div class="rounded-2xl overflow-hidden w-full bg-tia-100 shadow-md border border-tia-300 flex items-center">
            @if (isset($image))
                {{ $image }}
            @endif
        </div>


        <div class="flex items-center flex-col justify-center py-10">
            <section class="w-full max-w-sm">
                {{ $slot }}
            </section>
        </div>
    </section>
</x-layout>
