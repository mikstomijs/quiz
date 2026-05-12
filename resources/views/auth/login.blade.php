<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6">
        <h1 class="text-3xl font-bold bg-gradient-to-r from-[#00e5ff] to-[#c850f0] bg-clip-text text-transparent">
            {{ __('Login') }}
        </h1>
        <p class="mt-2 text-[#8892a4]">Enter your credentials to access your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <div class="relative mt-2">
                <svg class="absolute left-3 top-3.5 w-4 h-4 text-[#00e5ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <x-text-input id="email" class="block w-full pl-10" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative mt-2">
                <svg class="absolute left-3 top-3.5 w-4 h-4 text-[#c850f0]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <x-text-input id="password" class="block w-full pl-10"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="w-4 h-4 rounded bg-[#0a0a1a] border-[rgba(0,229,255,0.3)] accent-[#00e5ff]" name="remember">
                <span class="ms-2 text-sm text-[#8892a4]">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col gap-3 mt-6">
            <x-primary-button class="w-full">
                {{ __('Log in') }}
            </x-primary-button>

            @if (Route::has('password.request'))
                <a class="text-center text-sm text-[#00e5ff] hover:text-[#ffffff] rounded-md focus:outline-none" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        @if (Route::has('register'))
            <p class="text-center text-sm text-[#8892a4] mt-4">
                {{ __('Don\'t have an account?') }}
                <a href="{{ route('register') }}" class="text-[#00e5ff] hover:text-[#ffffff] font-medium">
                    {{ __('Register here') }}
                </a>
            </p>
        @endif
    </form>
</x-guest-layout>
