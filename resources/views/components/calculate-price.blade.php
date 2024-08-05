<form action="" class="border border-slate-300 bg-white shadow rounded-md p-3 md:p-7 w-full max-w-sm"
    x-data="calculatePrice" @input-changed="handleInput">
    @csrf

    <h6 class="font-bold mb:1 md:mb-2 uppercase ">Calculate Price</h6>
    <div class="mb-2">
        <x-forms.label for="academic_level" value="Avademic Level" />
        <x-forms.select name="academic_level" x-model="academicLevel">
            @foreach ($levels as $item)
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </x-forms.select>
        <x-forms.error name="academic_level" />
    </div>



    <div class="mb-2">
        <x-forms.label for="paper_type" value="Paper Type" />
        <x-forms.select name="paper_type">
            @foreach ($paperTypes as $item)
                <option @selected(old('paper_type') == $item) value="{{ $item }}">{{ ucfirst($item) }}
                </option>
            @endforeach
        </x-forms.select>
        <x-forms.error name="paper_type" />
    </div>

    <div class="mb-2">
        <x-forms.label name="number_of_pages" value="Number of pages" />
        <x-forms.counter name="number_of_pages" minVal="1" maxVal="100" label="Number of Pages"
            value="{{ old('number_of_pages') }}" />
        <x-forms.error name="number_of_pages" />
    </div>


    <div class="mb-2">
        <x-forms.label name="deadline" value="Deadline" />
        <x-forms.select name="deadline" x-model="deadline">
            @foreach ($deadlines as $item)
                <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </x-forms.select>
        <x-forms.error name="deadline" />
    </div>
    <div class="flex items-center bh justify-end">
        <span class="text-sm">Price (USD)</span>
        <span class="ms-3 font-bold text-green-700 text-lg" x-text="'$ ' + totalPrice()"></span>

    </div>
    <div class="mt-3">
        <button class="form-btn w-full">ORDER NOW</button>
    </div>
</form>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('calculatePrice', () => ({
            basePrices: @js($basePrices),
            numberOfPages: 1,
            academicLevel: '',
            deadline: '6 hours',
            urgencyMultipliers: @js($urgencyMultipliers),

            price() {
                if (this.academicLevel == null || this.academicLevel.length == 0) {
                    return 0;
                }
                return this.basePrices[this.academicLevel];
            },

            handleInput(event) {
                this.numberOfPages = event.detail;
            },

            // calculate the total amount
            urgencyMultiplier() {
                return this.urgencyMultipliers[this.deadline];
            },

            totalPrice() {
                let categoryMultiplier = @js($writerCategoryMultipliers);
                let price = this.price() * this.numberOfPages * this.urgencyMultiplier();
                return price.toFixed(2);
            }
        }))
    })
</script>
