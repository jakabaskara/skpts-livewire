<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css'])
    @filamentStyles
</head>

<body>

    <main>
        <div class="bg-dark">
            {{ $slot }}
        </div>
    </main>

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
