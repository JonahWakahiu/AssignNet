@props(['name', 'value'])

<label {{ $attributes->merge(['class' => 'w-fit pl-0.5 text-sm text-slate-700 dark:text-slate-300']) }}>
    {{ $value ?? $slot }}
</label>
