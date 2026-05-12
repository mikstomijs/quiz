<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#00e5ff]">{{ __('Verify Email') }}</h1>
        <p class="mt-2 text-sm text-[#8892a4]">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 p-4 bg-[#1a1a2e] border border-[rgba(0,201,167,0.3)] rounded-lg">
            <p class="success-text font-medium">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </p>
        </div>
    @endif

    <div class="mt-6 flex flex-col gap-2">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="w-full">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="w-full text-center text-sm text-[#00e5ff] hover:text-[#ffffff] rounded-md focus:outline-none">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
