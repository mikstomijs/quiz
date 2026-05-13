<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#06060f">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>{{ $title ?? "Quiz" }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="quantum-body">
    <div class="app-shell admin-shell">
        <x-navbar-admin></x-navbar-admin>
        <main class="page-content">
            {{ $slot }}
        </main>
    </div>
</body>
</html>