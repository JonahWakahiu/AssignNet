<div {{ $attributes->merge(['class' => ' flex flex-col justify-center text-center py-5 px-3 md:px-10 rounded']) }}>
    <span class="mx-auto">
        {{ $svg }}
    </span>

    <h5 class="font-bold text-slate-700 my-3">
        {{ $title }}
    </h5>
    <p>
        {{ $slot }}
    </p>
</div>
