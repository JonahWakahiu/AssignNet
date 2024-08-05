<x-layouts.guest>
    @include('layouts.main-navigation')

    <section class="mx-3 md:mx-10 mt-10">
        <h3 class="mt-10 text-2xl">How does the price for my order form?</h3>
        <div class="mt-3 md:mt-5 p-3 md:p-10 rounded border bg-slate-100/50 border-slate-300">
            <h6>
                Four (4) very basic factors determine how much your order will cost. These factors include:
            </h6>
            <ul class="list-inside list-disc">
                <li>
                    Subscription Category
                </li>
                <li>
                    Course level
                </li>
                <li>
                    Number of pages
                </li>
                <li>
                    Urgency
                </li>
            </ul>
            <p>
                Please note that the prices listed above are for a single page. In case of more than one page the price
                will be multiplied by the number of pages.
            </p>

        </div>

        <h3 class="mb-5">Transparent and Competitive Pricing</h3>
        <p></p>



        @foreach ($categories as $category)
            <h4 class="text-2xl capitalize mb-3 mt-5 first:mt-0">{{ $category }}</h4>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-10">

                @foreach ($levels as $level)
                    <x-card-prices>
                        <x-slot:level>{{ $level }}</x-slot>
                        @foreach ($deadline as $urgency)
                            @php
                                $categoryMultiplier = $writerCategoryMultipliers[$category];
                                $basePrice = $basePrices[$level];
                                $urgencyMultiplier = $urgencyMultipliers[$urgency];
                                $price = $basePrice * $categoryMultiplier * $urgencyMultiplier;
                            @endphp

                            <div class="space-y-1">
                                <div class="flex justify-between">
                                    <p>{{ $urgency }}</p>
                                    <p class="font-bold text-lg text-blue-700">${{ number_format($price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </x-card-prices>
                @endforeach


            </div>
        @endforeach

        </div>


    </section>
    @include('layouts.footer')
</x-layouts.guest>
