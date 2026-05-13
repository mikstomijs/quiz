<x-guest-layout>
    <h1 class="neon-heading neon-heading--compact">{{ __('Log in') }}</h1>
    <p class="quantum-auth-lead">{{ __('Welcome back. Enter your credentials to continue.') }}</p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="auth-field">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="auth-field">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="auth-checkbox-row">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me" class="auth-checkbox-label">{{ __('Remember me') }}</label>
        </div>

        <div class="auth-form-actions">
            <div class="auth-form-links">
                @if (Route::has('password.request'))
                    <a class="quantum-link" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
                @if (Route::has('register'))
                    <a class="quantum-link" href="{{ route('register') }}">{{ __("Don't have an account?") }}</a>
                @endif
            </div>

            <x-primary-button>{{ __('Log in') }}</x-primary-button>
        </div>
    </form>
</x-guest-layout>
