<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset("style.css") }}">
    <title>{{ $title ?? "Quiz" }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="quantum-body">
    <div class="app-shell">
        <x-navbar></x-navbar>
        <main class="page-content">
            {{ $slot }}
        </main>
    </div>
</body>
</html>