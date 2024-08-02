@props(['name'])

<div class="relative flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
        class="absolute pointer-events-none right-4 top-1/2 -translate-y-1/2 h-5 w-5">
        <path fill-rule="evenodd"
            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
            clip-rule="evenodd" />
    </svg>
    <select :id="{{ $name }}" name="{{ $name }}"
        {{ $attributes->merge(['class' => 'w-full appearance-none rounded-xl border border-slate-300 bg-slate-100 px-4 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-blue-600']) }}>
        <option selected disabled value="" class="text-slate-500">Please Select...</option>
        {{ $slot }}
    </select>
</div>
