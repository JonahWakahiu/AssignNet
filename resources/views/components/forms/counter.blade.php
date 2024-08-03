@props(['name', 'value', 'minVal', 'maxVal', 'data'])
{{ $data }}
@php
    if (empty($value)) {
        $value = $minVal;
    }
@endphp

<div x-data="{
    currentVal: @js($value),
    minVal: @js($minVal),
    maxVal: @js($maxVal),
    showDropdown: false,
    increase() {
        if (this.currentVal < this.maxVal) {
            this.currentVal++;
        }
    },
    decrease() {
        if (this.currentVal > this.minVal) {
            this.currentVal--;
        }
    },
}" @click="showDropdown = true"
    {{ $attributes->merge(['class' => 'relative bg-white text-sm font-medium block w-full border border-slate-300 rounded-md px-3 py-2 ring-2 ring-transparent hover:ring-blue-600 ']) }}>

    <span x-text="currentVal"></span>
    <span class="ms-2">{{ ucfirst($name) }}</span>

    <input type="hidden" name="{{ $name }}" id="{{ $name }}" x-model="currentVal" {{ $attributes }}>

    <div x-cloak x-show="showDropdown" @click.outside="showDropdown = false"
        class="absolute z-10 top-full mt-1 right-0 border border-slate-300 bg-white w-full max-w-48 p-3 shadow-md grid grid-cols-2 items-center">

        <p class="text-slate-900 font-medium">{{ ucfirst($name) }}</p>
        <div class="border border-slate-400 grid grid-cols-3 p-2 items-center">
            <button type="button" @click="decrease">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                </svg>
            </button>

            <span x-text="currentVal">
            </span>

            <button type="button" @click="increase">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
        </div>
    </div>
</div>
