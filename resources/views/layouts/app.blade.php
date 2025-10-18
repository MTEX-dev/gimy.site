<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>
            @hasSection('title')@yield('title') |
            {{ config('app.name', 'Laravel') }}@else{{ config('app.name', 'Laravel') }}@endif
        </title>

        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />

        @vite(['resources/css/app.css', 'resources/js/app.js']) @stack('head')
    </head>
    <body
        class="font-sans antialiased bg-gray-100 dark:bg-gray-900 flex flex-col min-h-screen"
    >
        @if (!isset($hideNavbar) || $hideNavbar !== true)
            @include('components.navbar')
        @endif

        <div class="flex-grow bg-gray-100 dark:bg-gray-900">
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

        @stack('scripts')
    </body>
</html>