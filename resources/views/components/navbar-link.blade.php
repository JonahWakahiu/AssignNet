@props(['active', 'value'])

<a {{ $attributes->class(['font-semibold hover:text-tia-500', 'text-tia-700' => $active]) }}>
    {{ $value ?? $slot }}
</a>
