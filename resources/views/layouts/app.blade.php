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
    <div class="app-shell">
        <x-navbar />
        <main class="page-content">
            @isset($header)
                <header class="page-header">
                    {{ $header }}
                </header>
            @endisset

            {{ $slot }}
        </main>
    </div>
</body>
</html>
