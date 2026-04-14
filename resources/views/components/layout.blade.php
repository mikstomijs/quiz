<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset("style.css") }}">
    <title>{{ $title ?? "Quiz" }}</title>
</head>
<body>
    <x-navbar-admin></x-navbar-admin>
      {{ $slot }}
</body>
</html>