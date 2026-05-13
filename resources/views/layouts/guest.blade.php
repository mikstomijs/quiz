<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#06060f">
    <title>{{ config('app.name', 'Quantum Quiz') }}</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="quantum-body">
    <div class="quantum-auth-page">
        <div class="quantum-auth-inner">
            <div class="quantum-auth-brand">
                <a href="{{ url('/') }}" class="site-nav__brand">Quantum Quiz</a>
            </div>
            <div class="card-panel quantum-auth-card">
                {{ $slot }}
            </div>
            <div class="auth-footer-links">
                <a href="{{ url('/') }}" class="quantum-link">{{ __('Back to home') }}</a>
                @if (Route::has('login') && ! request()->routeIs('login'))
                    <a href="{{ route('login') }}" class="quantum-link">{{ __('Log in') }}</a>
                @endif
                @if (Route::has('register') && ! request()->routeIs('register'))
                    <a href="{{ route('register') }}" class="quantum-link">{{ __('Register') }}</a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
