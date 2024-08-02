@props(['name', 'type' => 'text'])

<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
    {{ $attributes->merge(['class' => 'w-full rounded-xl border border-slate-300 bg-slate-100 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-blue-600']) }} />
