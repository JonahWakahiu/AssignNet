<x-layouts.guest>
    @include('layouts.main-navigation')
    <section class="container mx-auto grid place-items-center mt-10">

        <div x-data="{ selectedTab: 'new_customer' }" class="w-full max-w-3xl  bg-white rounded shadow">

            <div @keydown.right.prevent="$focus.wrap().next()" @keydown.left.prevent="$focus.wrap().previous()"
                class="flex gap-2 overflow-x-auto border-b border-slate-300 dark:border-slate-700" role="tablist"
                aria-label="tab options">

                <button @click="selectedTab = 'new_customer'" :aria-selected="selectedTab === 'new_customer'"
                    :tabindex="selectedTab === 'new_customer' ? '0' : '-1'"
                    :class="selectedTab === 'new_customer' ?
                        'font-bold text-blue-700 border-b-2 border-blue-700 dark:border-blue-600 dark:text-blue-600' :
                        'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'"
                    class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelGroups">New
                    Customer</button>

                <button @click="selectedTab = 'existing_customer'" :aria-selected="selectedTab === 'existing_customer'"
                    :tabindex="selectedTab === 'existing_customer' ? '0' : '-1'"
                    :class="selectedTab === 'existing_customer' ?
                        'font-bold text-blue-700 border-b-2 border-blue-700 dark:border-blue-600 dark:text-blue-600' :
                        'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'"
                    class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelLikes">Existing
                    Customer</button>

            </div>


            <div class="px-10 py-5 text-slate-700 dark:text-slate-300">

                <div x-show="selectedTab === 'new_customer'" id="tabpanelGroups" role="tabpanel" aria-label="groups">
                    @session('error')
                        <p class="text-sm font-sembold tracking-wide text-red-700 my-2">{{ $value }}</p>
                    @endsession
                    <form action="{{ route('order.step-two.handle') }}" method="POST">
                        @csrf

                        <h6 class="font-bold mb-5">New Customer</h6>
                        <div class="mb-2">
                            <x-forms.label for="name" value="Name" />
                            <x-forms.input name="name" value="{{ old('name') }}" />
                            <x-forms.error name="name" bag="newUser" />
                        </div>

                        <div class="mb-2">
                            <x-forms.label for="email" value="Email" />
                            <x-forms.input type="email" name="email" value="{{ old('email') }}" />
                            <x-forms.error name="email" bag="newUser" />
                        </div>

                        <div class="mb-2">
                            <x-forms.label for="phone_number" value="Phone Number" />
                            <x-forms.phonenumber name="phone_number" value="{{ old('phone_number') }}" />
                            <x-forms.error name="phone_number" bag="newUser" />
                        </div>

                        <div class="grid grid-cols-2 gap-5 mb-2">
                            <div class="mb-2">
                                <x-forms.label for="password" value="Password" />
                                <x-forms.password name="password" />
                                <x-forms.error name="password" bag="newUser" />
                            </div>

                            <div class="mb-2">
                                <x-forms.label for="password_confirmation" value="Confirm Password" />
                                <x-forms.password name="password_confirmation" />
                                <x-forms.error name="password_confirmation" bag="newUser" />
                            </div>
                        </div>

                        <div class="mb-2">
                            <x-forms.label class="flex items-center gap-2">
                                <x-forms.checkbox name="terms" />
                                I agree with <a href="" class="text-java-500 hover:text-java-600">Terms and
                                    Condition</a>
                            </x-forms.label>
                            <x-forms.error name="terms" bag="newUser" />
                        </div>

                        <div class="mt-5 flex justify-between">
                            <a href="{{ route('order.step-one') }}"
                                class=" font-semibold border border-java-500 text-java-500 py-2 px-7 rounded-md">Back</a>
                            <button type="submit" class="form-btn">Checkout</button>
                        </div>
                    </form>
                </div>


                <div x-show="selectedTab === 'existing_customer'" id="tabpanelLikes" role="tabpanel" aria-label="likes">
                    <form action="{{ route('order.step-two-existing-user.handle') }}" method="POST">
                        @csrf

                        <h6 class="font-bold mb-5">Existing Customer?</h6>
                        <div class="mb-2">
                            <x-forms.label for="email" value="Email" />
                            <x-forms.input name="email" type="email" />
                            <x-forms.error name="email" bag="exisitingUser" />
                        </div>
                        <div class="mb-2">
                            <x-forms.label for="password" value="Password" />
                            <x-forms.password name="password" />
                            <x-forms.error name="password" bag="exisitingUser" />
                        </div>
                        <div class="mt-5 flex justify-between">
                            <a href="{{ route('order.step-one') }}"
                                class=" font-semibold border border-java-500 text-java-500 py-2 px-7 rounded-md">Back</a>
                            <button class="form-btn" type="submit">Login</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>
</x-layouts.guest>
