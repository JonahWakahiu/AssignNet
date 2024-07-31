<x-layouts.auth>
    <x-slot:image>
        <img src="/assets/background/verify-email.svg" alt="" class="h-[86svh] w-full">
    </x-slot>

    <div class="mb-10">
        <h4 class="font-extrabold text-slate-700">Email Confirmation</h4>
        <p class="text-sm mt-1">Thanks for signing up! Before getting started, could you verify your email address by
            clicking on the link we
            just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
    </div>

    @session('status')
        <p class="text-sm text-green-500 my-2">{{ $value }}</p>
    @endsession

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div>
            <button type="submit" class="form-btn">Resend Verification Email</button>
        </div>
    </form>
</x-layouts.auth>
