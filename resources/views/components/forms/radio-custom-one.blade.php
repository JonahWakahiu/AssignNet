@props(['name', 'item', 'order'])

<label for="{{ $item }}"
    class=" px-5 py-2 bg-slate-100 border flex-shrink-0 border-collapse first:rounded-s-xl last:rounded-e-xl border-slate-300  cursor-pointer inline-flex items-center peer-checked:bg-indigo-50 peer-checked:text-indigo-500 peer-checked:border-indigo-500 peer-checked:ring-indigo-200">
    <span class="capitalize text-sm text-slate-600">{{ $item }}</span>
    <input type="radio" @checked(strtolower(old($name, $order?->$name)) == strtolower($item)) name="{{ $name }}" id="{{ $item }}"
        value="{{ $item }}" {{ $attributes->merge(['class' => 'hidden peer']) }} />
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        class="bi bi-check-lg ms-3 size-5 text-transparent peer-checked:text-indigo-500" viewBox="0 0 16 16">
        <path
            d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
    </svg>
</label>
