<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @if (app('session')->has('_token'))
            <meta name="csrf-token" content="{{ csrf_token() }}">
        @endif

        <title>{{ config('app.name', 'gimy.site') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body class="font-sans antialiased flex flex-col min-h-screen">
        <div class="flex-grow bg-gray-100 dark:bg-gray-900">
            @if (!isset($hideNavbar) || $hideNavbar !== true)
                @include('components.navbar')
            @endif

            @hasSection('header')
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @yield('header')
                    </div>
                </header>
            @endif

            <main>
                @yield('content')
            </main>
        </div>

        @if (!isset($hideFooter) || $hideFooter !== true)
            @include('components.footer')
        @endif

        @if (!isset($hideScrollToTopBtn) || $hideScrollToTopBtn !== true)
            @include('components.scroll-to-top-btn')
        @endif
    </body>
</html>