@props(['name', 'value'])

<label {{ $attributes->merge(['class' => 'mb-1 block text-base font-medium text-dark dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
