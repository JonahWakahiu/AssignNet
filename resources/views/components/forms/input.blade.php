@props(['name', 'type' => 'text'])

<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
    {{ $attributes->merge(['class' => 'w-full bg-transparent rounded-md border border-stroke dark:border-dark-3 py-[10px] px-5 text-dark-6 outline-none transition hover:border-java-500  focus:border-java-500 active:border-java-500 disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2']) }} />
