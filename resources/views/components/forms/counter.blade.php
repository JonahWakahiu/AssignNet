@props(['name', 'value', 'minVal', 'maxVal', 'label'])

<div x-data="counter" @click="showDropdown = true"
    class="relative bg-slate-100 text-sm font-medium block w-full border border-slate-300 rounded-lg px-3 py-2 ring-2 ring-transparent hover:ring-blue-600">

    <span x-text="currentVal"></span>
    <span class="ms-2">{{ ucfirst($label) }}</span>


    <div x-cloak x-show="showDropdown" @click.outside="showDropdown = false" x-init="$watch('currentVal', value => $dispatch('input-changed', value))"
        class="absolute z-10 top-full mt-1 right-0 border border-slate-300 bg-slate-50 w-full max-w-48 p-3 shadow-md grid grid-cols-2 items-center">

        <p class="text-slate-900 font-medium text-xs text-wrap">{{ ucfirst($label) }}</p>
        <div class="border border-slate-400 grid grid-cols-3 p-2 items-center">
            <button type="button" @click="decrease">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                </svg>
            </button>

            <input type="text" name="{{ $name }}" id="{{ $name }}" x-model="currentVal"
                @input="handleInput" {{ $attributes->merge(['class' => 'outline-none']) }}>

            <button type="button" @click="increase">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('counter', () => ({
            showDropdown: false,
            minVal: @js($minVal),
            maxVal: @js($maxVal),
            currentVal: isNaN(@js($value)) ? @js($value) : @js($minVal),



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

        }))
    })
</script>
