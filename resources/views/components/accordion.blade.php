<div x-data="{ isExpanded: false }" class="border-b border-slate-300 overflow-hidden w-full">
    <button id="controlsAccordionItemOne" type="button"
        class="flex w-full text-sm items-center justify-between gap-2 bg-white p-3.5 md:p-4 text-left underline-offset-2 hover:bg-white/90 focus-visible:bg-slate-100/75 focus-visible:underline focus-visible:outline-none dark:bg-slate-800 dark:hover:bg-slate-800/75 dark:focus-visible:bg-slate-800/75"
        aria-controls="accordionItemOne" @click="isExpanded = ! isExpanded"
        :class="isExpanded ? 'font-bold' :
            'font-medium'" :aria-expanded="isExpanded ? 'true' : 'false'">
        {{ $heading }}
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor"
            class="size-5 shrink-0 transition" aria-hidden="true" :class="isExpanded ? 'rotate-180' : ''">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
    </button>


    <div x-cloak x-show="isExpanded" :id="$id('accordionItemOne')" role="region"
        aria-labelledby="controlsAccordionItemOne" x-collapse>
        <div class="p-4 text-sm sm:text-base text-pretty">
            {{ $slot }}
        </div>
    </div>
</div>
