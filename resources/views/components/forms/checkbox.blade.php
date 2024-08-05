@props(['name', 'checked' => false])

<div class="relative flex items-center">
    <input id="{{ $name }}" name="{{ $name }}" type="checkbox" :checked="$checked"
        class="before:content[''] peer relative size-5 cursor-pointer appearance-none overflow-hidden rounded border border-slate-300 bg-slate-100 before:absolute before:inset-0 checked:border-java-500 checked:before:bg-java-500 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-slate-800 checked:focus:outline-java-500 active:outline-offset-0 disabled:cursor-not-allowed dark:border-slate-700 dark:bg-slate-800 dark:checked:border-java-600 dark:checked:before:bg-java-600 dark:focus:outline-slate-300 dark:checked:focus:outline-java-600" />
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none"
        stroke-width="4"
        class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-slate-100 peer-checked:visible dark:text-slate-100">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
    </svg>
</div>
