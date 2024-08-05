<x-layouts.guest>
    @include('layouts.main-navigation')
    <section class="container mx-auto grid place-items-center mt-10  relative " x-data="orderFormData"
        @input-changed="handleInput">

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
                    <x-forms.select name="academic_level" x-model="academicLevel">
                        @foreach ($levels as $item)
                            <option @selected(old('discipline') == $item) value="{{ $item }}">{{ ucfirst($item) }}
                            </option>
                        @endforeach
                    </x-forms.select>
                    <x-forms.error name="academic_level" />
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-2 mb-2">

                    <div>
                        <x-forms.label for="paper_type" value="Type of Paper:" />
                        <x-forms.select name="paper_type" x-model="paperType">
                            @foreach ($paperTypes as $item)
                                <option @selected(old('paper_type', $order?->paper_type) == $item) value="{{ $item }}">{{ $item }}
                                </option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.error name="paper_type" />
                    </div>


                    <div>
                        <x-forms.label for="discipline" value="Discipline:" />
                        <x-forms.combobox name="discipline" :options="$disciplines"
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
                    <x-forms.counter name="number_of_pages" label="Number Of Pages" minVal="1" maxVal="100"
                        value="{{ old('number_of_pages') }}" />
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
                        <x-forms.select name="currency" x-model="currency">
                            @foreach ($currency as $item)
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
                        @foreach ($deadline as $item)
                            <x-forms.radio-custom-one name="deadline" :$item :$order x-model="deadline" />
                        @endforeach
                    </div>
                    <x-forms.error name="deadline" />
                </div>

                <div class="mb-2">
                    <p class="text-slate-700">Writer Category:</p>
                    <div class="flex flex-wrap gap-y-1 w-full">
                        @foreach ($categories as $item)
                            <x-forms.radio-custom-one name="writer_category" :$item :$order x-model="writerCategory" />
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
                <p class="capitalize" x-text="academicLevel">Academic Level</p>
                <p class="capitalize" x-text="paperType">Paper type</p>

                <div class="border-b border-slate-300 mt-2"></div>
                <div class="py-2 flex justify-between items-center">
                    <p><span x-text="numberOfPages"></span> page * <span x-text="basePrice()"></span></p>
                    <p x-text="subTotal()"></p>
                </div>


                <div class="border-b border-slate-300"></div>

                <div class="flex justify-between items-center mt-2">
                    <span>Total price</span>
                    <p class="text-green-600 font-bold text-lg">
                        <span x-text="currencySymbol()"></span>
                        <span x-text="total"></span>
                    </p>
                </div>
            </div>

        </div>


    </section>

</x-layouts.guest>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('orderFormData', () => ({
            academicLevel: @js($order?->academic_level ?? ''),
            numberOfPages: 1,
            paperType: '',
            deadline: '24 hours',
            writerCategory: 'Standard',
            currency: 'USD',


            handleInput(event) {
                this.numberOfPages = event.detail;
            },


            basePrice() {
                let basePrices = @js($basePrices);
                let basePrice = basePrices[this.academicLevel];

                if (basePrice) {

                    return basePrice;
                }
                return 0;
            },

            subTotal() {
                let subTotal = this.numberOfPages * this.basePrice();
                return subTotal;
            },

            total() {
                let urgencyMultipliers = @js($urgencyMultipliers);
                let urgencyMultiplier = urgencyMultipliers[this.deadline];

                let categoryMultipliers = @js($writerCategoryMultipliers);
                let categoryMultiplier = categoryMultipliers[this.writerCategory];

                let currencyMultipliers = @js($currencyMultipliers);
                let currencyMultiplier = currencyMultipliers[this.currency];

                let total = this.subTotal() * urgencyMultiplier * categoryMultiplier *
                    currencyMultiplier;

                return total.toFixed(2);
            },

            currencySymbol() {
                let currencySymbols = @js($currencySymbols);
                let currencySymbol = currencySymbols[this.currency];
                return currencySymbol;
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
