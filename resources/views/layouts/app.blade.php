<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
    @filamentStyles
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
            document.querySelector('html').classList.add('dark');
            document.querySelector('html').style.colorScheme = 'dark';
        } else {
            document.querySelector('html').classList.remove('dark');
            document.querySelector('html').style.colorScheme = 'light';
        }
    </script>
</head>

<body class="font-inter antialiased bg-black text-gray-400" :class="{ 'sidebar-expanded': sidebarExpanded }"
    x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">

    <script>
        if (localStorage.getItem('sidebar-expanded') == 'true') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>

    <!-- Page wrapper -->
    <div class="flex h-[100dvh] overflow-hidden">

        <x-sidebar :variant="$attributes['sidebarVariant']" />

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden @if ($attributes['background']) {{ $attributes['background'] }} @endif"
            x-ref="contentarea">

            <x-header :variant="$attributes['headerVariant']" />

            <main class="grow">
                {{ $slot }}
            </main>

        </div>

    </div>

    @livewireScripts
    @filamentScripts

    <script>
        $('.btn-load').on('click', function() {
            if ($(this).find('.loading-spinner').length === 0) {
                $(this).prepend('<span class="loading loading-spinner"></span>');
            }

        })
    </script>
    @stack('js')
</body>

</html>
