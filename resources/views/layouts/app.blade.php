<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>
            @hasSection('title')
                @yield('title') - {{ config('app.name', 'Gimy.Site') }}
            @else
                {{ config('app.name', 'Gimy.Site') }}
            @endif
        </title>

        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />

        @vite(['resources/css/app.css', 'resources/js/app.js']) @stack('head')
    </head>
    <body
        class="flex min-h-screen flex-col bg-gray-100 font-sans antialiased dark:bg-gray-900"
    >
        @if (!isset($hideNavbar) || $hideNavbar !== true)
            @include('components.navbar')
        @endif

        <div class="flex-grow bg-gray-100 dark:bg-gray-900">
            @hasSection('header')
                <header class="bg-white shadow dark:bg-gray-800">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        @yield('header')
                    </div>
                </header>
            @endif

            <main>
                @yield('content')
            </main>
        </div>

        @include('components.toast-notifications')

        @if (!isset($hideFooter) || $hideFooter !== true)
            @include('components.footer')
        @endif

        @if (!isset($hideScrollToTopBtn) || $hideScrollToTopBtn !== true)
            @include('components.scroll-to-top-btn')
        @endif

        @stack('scripts')
    </body>
</html>