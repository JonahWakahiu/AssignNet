@php
    $user = Auth::user();
@endphp


<x-layouts.app>
    <div class="mb-5">
        <h5 class="font-bold text-slate-800 ">Profile</h5>
        <p class="text-sm text-slate-600 mt-1">User Profile</p>
    </div>


    <div class="bg-white rounded-md p-5 shadow-md border border-slate-300 mt-5">
        <div class="w-full h-28 rounded-tr-2xl bg-gradient-to-r from-tia-800 to-tia-500"></div>

        <div class="flex items-center gap-5 -mt-8">
            <div class="size-28 rounded-full border-8 border-white shadow-md bg-java-300">
                <img src="{{ $user->profile_image }}" alt="{{ $user->name }}" class="w-full h-full">
            </div>

            <div class="mt-5">
                <h5 class="text-slate-700 font-extrabold">{{ $user->name }}</h5>
                <p class="">{{ $user->email }}</p>
            </div>
        </div>

        <h6 class="text-slate-700 font-extrabold mt-7">Update your profile</h6>

        <form action="" method="POST" class="my-5">
            @csrf
            <div class="mb-2 flex items-center gap-10">
                <div>
                    <x-forms.file-image name="profile_image" />
                    <x-forms.error name="profile_image" />
                </div>

                <div class="space-y-2">
                    <button class="form-btn" type="submit">Change Image</button>
                    <p class="text-sm">
                        No file chosen
                        Change Image
                        For better preview recommended size is 450px x 450px. Max size 5MB.</p>
                </div>

            </div>
        </form>

        <form action="{{ route('profile.profile') }}" method="POST" enctype="multipart/form-data" class="mt-2">
            @csrf


            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-5">
                <div>
                    <x-forms.label for="name" value="Name" />
                    <x-forms.input name="name" value="{{ old('name', $user->name) }}" />
                    <x-forms.error name="name" bag="profile" />
                </div>
                <div>
                    <x-forms.label for="email" value="Email" />
                    <x-forms.input name="email" value="{{ old('email', $user->email) }}" />
                    <x-forms.error name="email" bag="profile" />
                </div>
                <div>
                    <x-forms.label for="your_location" value="Your Location" />
                    <x-forms.input name="your_location" value="{{ old('your_location', $user->your_location) }}" />
                    <x-forms.error name="your_location" bag="profile" />
                </div>
                <div>
                    <x-forms.label for="phone_number" value="Phone Number" />
                    <x-forms.input name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" />
                    <x-forms.error name="phone_number" bag="profile" />
                </div>
                <div>
                    <x-forms.label for="birth_date" value="Date Of Birth" />
                    <x-forms.input name="birth_date" type="date"
                        value="{{ old('birth_date', $user->birth_date) }}" />
                    <x-forms.error name="birth_date" bag="profile" />
                </div>

                <div>
                    <x-forms.label for="language" value="Language" />
                    <x-forms.input name="language" value="{{ old('language', $user->language) }}" />
                    <x-forms.error name="language" bag="profile" />
                </div>

            </div>

            <div class="mt-5 flex justify-end items-center">
                @if (session('status') == 'profile-saved')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                        class="text-sm text-green-500 me-5 font-bold">Saved</p>
                @endif
                <button type="submit" class="form-btn">Update Profile</button>
            </div>
        </form>
    </div>


    <div class="bg-white rounded-md p-5 shadow-md border border-slate-300 mt-5">
        <h5 class="text-slate-700 font-extrabold">Change Password</h5>

        <form action="{{ route('profile.password') }}" method="POST" class="mt-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-5">
                <div>
                    <x-forms.label for="current_password" value="Current Password" />
                    <x-forms.password name="current_password" />
                    <x-forms.error name="current_password" bag="password" />
                </div>
                <div class="">
                    <x-forms.label for="password" value="Password" />
                    <x-forms.password name="password" />
                    <x-forms.error name="password" bag="password" />
                </div>

                <div>
                    <x-forms.label for="password_confirmation" value="Confirm Password" />
                    <x-forms.password name="password_confirmation" value="{{ old('password_confirmation') }}" />
                    <x-forms.error name="password_confiramtion" bag="password" />
                </div>

            </div>

            <div class="mt-3">
                <h5 class="text-slate-800 font-extrabold">Password Requirement</h5>
                <p class="text-sm">Please follow this guide for a strong password:</p>

                <ul class="text-sm my-3 list-disc list-inside">
                    <li>One special characters</li>
                    <li>Min 6 characters</li>
                    <li>One number (2 are recommended)</li>
                    <li>Change it often</li>
                </ul>
            </div>

            <div class="mt-5 flex justify-end items-center">
                @if (session('status') == 'password-saved')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                        class="text-sm text-green-500 me-5 font-bold">Saved</p>
                @endif

                <button type="submit" class="form-btn">Update Password</button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-md p-5 shadow-md border border-slate-300 mt-5">
        <h5 class="text-slate-700 font-extrabold">Delete Password</h5>

        <p class="text-sm">Once you delete your account, there is no going back. Please be certain.</p>

        <div class="flex justify-end">
            <button class="py-2 px-7 rounded-md bg-tia-700 hover:bg-tia-800 text-white font-semibold text-sm">DELETE
                ACCOUNT</button>
        </div>
    </div>
</x-layouts.app>
