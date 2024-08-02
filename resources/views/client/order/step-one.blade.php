<x-layouts.guest>
    @include('layouts.main-navigation')
    <section class="container mx-auto grid place-items-center mt-10">

        <div class="max-w-3xl w-full bg-white rounded shadow p-10">
            <div>
                <h5 class="text-slate-800 uppercase font-bold">Place An Order</h5>
                <p>It's fast, secure and confidential</p>
            </div>

            <h6 class=" text-slate-700 font-bold mt-5 mb-1">Paper details</h6>

            <form action="{{ route('order.step-one.handle') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-2">
                    <p class="text-slate-700">Academic level:</p>
                    <div class="flex w-full">
                        @foreach (['college', 'undergraduate', 'masters', 'PHD'] as $item)
                            <label
                                class="bg-slate-50 px-5 py-2  border border-slate-300 cursor-pointer inline-flex items-center has-[:checked]:bg-indigo-50 has-[:checked]:text-indigo-500 has-[:checked]:border-indigo-500 has-[:checked]:ring-indigo-200 ">
                                <span class="text-sm capitalize text-slate-600 tracking-wide">{{ $item }}</span>
                                <input @checked(old('academic_level', $order?->academic_level) == $item) type="radio" name="academic_level"
                                    id="{{ $item }}" value="{{ $item }}"
                                    class="checked:border-indigo-500 ms-3 hidden peer" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-check-lg ms-3 size-5 text-transparent peer-checked:text-indigo-500 "
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                                </svg>
                            </label>
                        @endforeach
                    </div>
                    <x-forms.error name="academic_level" />
                </div>


                <div class="grid grid-cols-2 gap-5">

                    <div class="mb-2">
                        <x-forms.label for="paper_type" value="Type of Paper:" />
                        <x-forms.select name="paper_type">
                            @foreach ($paper_types as $item)
                                <option @selected($item == $order?->paper_type) value="{{ $item }}">{{ $item }}
                                </option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.error name="paper_type" />
                    </div>


                    <div class="mb-2">
                        <x-forms.label for="discipline" value="Discipline:" />
                        <x-forms.combobox name="discipline" :options="$disciplines" />
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
                    <p class="text-slate-700">Paper Format:</p>
                    <div class="flex flex-wrap gap-y-1 w-full">
                        @foreach (['APA', ' Chicago/Turabian', ' MLA', 'Havard', 'Not Applicable'] as $item)
                            <label
                                class="bg-slate-50 px-5 py-2 border border-slate-300 cursor-pointer inline-flex items-center has-[:checked]:bg-indigo-50 has-[:checked]:text-indigo-500 has-[:checked]:border-indigo-500 has-[:checked]:ring-indigo-200 ">
                                <span class="capitalize text-sm text-slate-600">{{ $item }}</span>
                                <input type="radio" @checked(old('paper_format', $order?->paper_format) == $item) name="paper_format"
                                    id="{{ $item }}" value="{{ $item }}"
                                    class="checked:border-indigo-500 ms-3 hidden peer" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-check-lg ms-3 size-5 text-transparent peer-checked:text-indigo-500 "
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                                </svg>
                            </label>
                        @endforeach
                    </div>
                    <x-forms.error name="paper_format" />
                </div>


                <div class="mb-2">
                    <x-forms.label for="number_of_pages" value="Number Of Pages:" />
                    <x-forms.counter name="number_of_pages" />
                    <x-forms.error name="number_of_pages" />
                </div>


                <div class="mb-2">
                    <p class="text-slate-700">Currency:</p>
                    <div class="flex flex-wrap gap-y-1 w-full">
                        @foreach (['USD', 'GBP', 'EUR', 'AUD'] as $item)
                            <label
                                class="bg-slate-50 px-5 py-2  border border-slate-300 cursor-pointer inline-flex items-center has-[:checked]:bg-indigo-50 has-[:checked]:text-indigo-500 has-[:checked]:border-indigo-500 has-[:checked]:ring-indigo-200 ">
                                <span class="capitalize text-sm text-slate-600">{{ $item }}</span>
                                <input type="radio" @checked(old('currency', $order?->currency) == $item) name="currency"
                                    id="{{ $item }}" value="{{ $item }}"
                                    class="checked:border-indigo-500 ms-3 hidden peer" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-check-lg ms-3 size-5 text-transparent peer-checked:text-indigo-500 "
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                                </svg>
                            </label>
                        @endforeach
                    </div>
                    <x-forms.error name="currency" />
                </div>


                <div class="mb-2">
                    <p class="text-slate-700">Deadline:</p>
                    <div class="flex w-full gap-y-1 flex-wrap">
                        @foreach (['6 hours', '12 hours', '24 hours', '48 hours', '3 days', '5 days', '7 days'] as $item)
                            <label
                                class="bg-slate-50 px-5 py-2  border border-slate-300 cursor-pointer inline-flex items-center has-[:checked]:bg-indigo-50 has-[:checked]:text-indigo-500 has-[:checked]:border-indigo-500 has-[:checked]:ring-indigo-200 ">
                                <span class="capitalize text-sm text-slate-600">{{ $item }}</span>
                                <input type="radio" @checked(old('deadline', $order?->deadline) == $item) name="deadline"
                                    id="{{ $item }}" value="{{ $item }}"
                                    class="checked:border-indigo-500 ms-3 hidden peer" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-check-lg ms-3 size-5 text-transparent peer-checked:text-indigo-500 "
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                                </svg>
                            </label>
                        @endforeach
                    </div>
                    <x-forms.error name="deadline" />
                </div>

                <div class="mb-2">
                    <p class="text-slate-700">Writer Category:</p>
                    <div class="flex flex-wrap gap-y-1 w-full">
                        @foreach (['standard', 'premium', 'platinum'] as $item)
                            <label
                                class="bg-slate-50 px-5 py-2  border border-slate-300 cursor-pointer inline-flex items-center has-[:checked]:bg-indigo-50 has-[:checked]:text-indigo-500 has-[:checked]:border-indigo-500 has-[:checked]:ring-indigo-200 ">
                                <span class="capitalize text-sm text-slate-600">{{ $item }}</span>
                                <input type="radio" @checked(old('writer_category', $order?->writer_category) == $item) name="writer_category"
                                    id="{{ $item }}" value="{{ $item }}"
                                    class="checked:border-indigo-500 ms-3 hidden peer" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-check-lg ms-3 size-5 text-transparent peer-checked:text-indigo-500 "
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                                </svg>
                            </label>
                        @endforeach
                    </div>
                    <x-forms.error name="writer_category" />
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="form-btn">Next</button>
                </div>

            </form>
        </div>


    </section>

</x-layouts.guest>
