<div class="bg-white rounded-xl p-4 md:p-10 flex flex-col md:flex-row  justify-center items-start gap-3 md:gap-5">

    <div class="bg-blue-700 text-white p-3 rounded-md mx-auto">
        {{ $svg }}
    </div>

    <div>
        <h5 class="font-bold mb-1 text-slate-800 text-center md:text-left">{{ $title }}</h5>
        <p class="text-center md:text-left">{{ $slot }}</p>
    </div>
</div>
