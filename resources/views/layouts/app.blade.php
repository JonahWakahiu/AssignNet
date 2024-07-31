<x-layout>
    <nav>
        <a href="{{ route('logout') }}">Logout</a>
    </nav>
    {{ $slot }}
</x-layout>
