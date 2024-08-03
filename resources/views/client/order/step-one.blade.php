<x-layouts.guest>
    @include('layouts.main-navigation')
    <section class="container mx-auto grid place-items-center mt-10  relative " x-data="orderFormData">

        <div class="max-w-3xl  w-full bg-white rounded shadow p-10">
            <div>
                <p class="text-slate-700 uppercase font-extrabold">Place An Order</p>
                <p class="text-sm text-slate-600 font-semibold">It's fast, secure and confidential</p>
            </div>

            <p class=" text-slate-700 font-bold mt-5 mb-1">Paper details</p>

            <form action="{{ route('order.step-one.handle') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="mb-2">
                    <x-forms.label for="discipline" value="Discipline:" />
                    <x-forms.combobox-simple name="discipline" :options="$academicLevels"
                        value="{{ old('discipline', $order?->discipline) }}" />
                    <x-forms.error name="discipline" />
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-2mb-2">

                    <div>
                        <x-forms.label for="paper_type" value="Type of Paper:" />
                        <x-forms.select name="paper_type" x-model="paperType">
                            @foreach ($paper_types as $item)
                                <option @selected(old('paper_type', $order?->paper_type) == $item) value="{{ $item }}">{{ $item }}
                                </option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.error name="paper_type" />
                    </div>


                    <div>
                        <x-forms.label for="discipline" value="Discipline:" />
                        <x-forms.combobox-simple name="discipline" :options="$disciplines"
                            value="{{ old('discipline', $order?->discipline) }}" />
                        <x-forms.error name="discipline" />
                    </div>
                </div>

                <div class="mb-2">
                    <x-forms.label for="topic" value="Topic:" />
                    <x-forms.input name="topic" value="{{ old('topic', $order?->topic) }}" />
                    <x-forms.error name="topic" />
                </div>

                <div class="mb-2">
                    <x-forms.label for="paper_instructions" value="Paper Instructions:" />
                    <x-forms.textarea
                        name="paper_instructions">{{ old('paper_instructions', $order?->paper_instructions) }}
                    </x-forms.textarea>
                    <x-forms.error name="paper_instructions" />
                </div>


                <div class="mb-2">
                    <x-forms.label for="additional_materials" value="Additional Materials:" />
                    <x-forms.file name="additional_materials" value="{{ old('additional_materials') }}" />
                    <x-forms.error name="additional_materials" />
                </div>


                <div class="mb-2">
                    <x-forms.label for="number_of_pages" value="Number Of Pages:" />
                    <div @click="showDropdown = true" @input.debounce.500ms="updateOuter"
                        x-on:input="currentVal = $event.target.value"
                        class ="relative bg-slate-100 text-sm font-medium block w-full border border-slate-300 rounded-md px-3 py-2 ring-2 ring-transparent hover:ring-blue-600 ">

                        <span x-text="numberOfPages"></span>
                        <span class="ms-2">Number Of Pages</span>

                        <input type="text" class="sr-only" name="number_of_pages" id="number_of_pages"
                            x-model="numberOfPages">

                        <div x-cloak x-show="showDropdown" @click.outside="showDropdown = false"
                            class="absolute z-10 top-full mt-1 right-0 border border-slate-300 bg-white w-full max-w-48 p-3 shadow-md grid grid-cols-2 items-center">

                            <p class="text-slate-900 font-medium">Number Of Pages</p>
                            <div class="border border-slate-400 grid grid-cols-3 p-2 items-center">
                                <button type="button" @click="decrease">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                    </svg>
                                </button>

                                <span x-text="numberOfPages">
                                </span>

                                <button type="button" @click="increase">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <x-forms.error name="number_of_pages" />
                </div>

                <div class="mb-2 grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-2">
                    <div>
                        <x-forms.label for="paper_format" value="Paper Format" />
                        <x-forms.select name="paper_format">
                            @foreach (['APA', 'Chicago/Turabian', 'MLA', 'Havard', 'Not Applicable'] as $item)
                                <option @selected(old('paper_format', $order?->paper_format) == $item) value="{{ $item }}">{{ $item }}
                                </option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.error name="paper_format" />
                    </div>

                    <div>
                        <x-forms.label for="currency" value="Currency" />
                        <x-forms.select name="currency">
                            @foreach (['USD', 'GBP', 'EUR', 'AUD'] as $item)
                                <option @selected(old('currency', $order?->currency) == $item) value="{{ $item }}">{{ $item }}
                                </option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.error name="currency" />
                    </div>
                </div>


                <div class="mb-2">
                    <p class="text-slate-700">Deadline:</p>
                    <div class="flex w-full gap-y-1 flex-wrap">
                        @foreach (['6 hours', '12 hours', '24 hours', '48 hours', '3 days', '5 days', '7 days'] as $item)
                            <x-forms.radio-custom-one name="deadline" :$item :$order x-model="deadline" />
                        @endforeach
                    </div>
                    <x-forms.error name="deadline" />
                </div>

                <div class="mb-2">
                    <p class="text-slate-700">Writer Category:</p>
                    <div class="flex flex-wrap gap-y-1 w-full">
                        @foreach (['standard', 'premium', 'platinum'] as $item)
                            <x-forms.radio-custom-one name="writer_category" :$item :$order
                                x-model="writerCategory" />
                        @endforeach
                    </div>
                    <x-forms.error name="writer_category" />
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="form-btn">Next</button>
                </div>

            </form>
        </div>

        <div
            class="hidden md:block fixed right-5 w-full max-w-64  top-1/2 -translate-y-1/2 border border-t-tia-500 border-slate-300 shadow z-20 p-5 bg-white text-sm">
            <div class="mb-4">
                <p class="text-slate-800 font-bold uppercase text-center">Writers Choice</p>
                <p class="text-slate-700 font-bold uppercase text-xs tracking-wide text-center">total price</p>
            </div>


            <div class="text-slate-600 font-medium">
                <p class="capitalize" x-text="academicLevel"></p>
                <p class="capitalize" x-text="paperType"></p>

                <div class="border-b border-slate-300 mt-2"></div>
                <div class="py-2 flex justify-between items-center">
                    <p><span x-text="numberOfPages"></span> page * <span x-text="basePrice()"></span></p>
                    <p x-text="additionalCost"></p>
                </div>
                <div class="border-b border-slate-300"></div>

                <div class="flex justify-between items-center mt-2">
                    <span>Total price</span>
                    <span class="text-green-500">USD <span x-text="finalPrice"></span></span>
                </div>
            </div>

        </div>


    </section>

</x-layouts.guest>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('orderFormData', () => ({
            academicLevel: 'college',
            numberOfPages: 1,
            paperType: 'essay',
            deadline: '24 hours',
            writerCategory: 'standard',

            basePrices: @js($basePrices),
            pricePerPage: @js($pricePerPage),
            urgencyMultipliers: @js($urgencyMultipliers),
            writerCategoryMultipliers: @js($writersCategoryMultipliers),

            basePrice() {
                return this.basePrices[this.academicLevel];
            },

            additionalCost() {
                return this.numberOfPages * this.basePrice();
            },

            urgencyMultiplier() {
                return this.urgencyMultipliers[this.deadline];
            },

            writerCategoryMultiplier() {
                return this.writerCategoryMultipliers[this.writerCategory];
            },

            finalPrice() {
                // return parseFloat(this.additionalCost() * this.urgencyMultiplier() * this
                //     .writerCategoryMultiplier());
                return parseFloat(((this.basePrice() + this.additionalCost()) * this
                    .urgencyMultiplier() * this.writerCategoryMultiplier()).toFixed(2));
            },

            minVal: 1,
            maxVal: 100,
            showDropdown: false,

            increase() {
                if (this.numberOfPages < this.maxVal) {
                    this.numberOfPages++;
                }
            },

            decrease() {
                if (this.numberOfPages > this.minVal) {
                    this.numberOfPages--;
                }
            },
        }));
    });
</script>
