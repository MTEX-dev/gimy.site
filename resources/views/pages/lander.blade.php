<!DOCTYPE html>
<html lang="en" x-data="{ theme: localStorage.getItem('theme') || 'system', scrolled: false, mobileMenuOpen: false, showScrollTop: false }"
    x-init="$watch('theme', val => {
        localStorage.setItem('theme', val);
        if (val === 'dark' || (val === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    });
    window.addEventListener('scroll', () => {
        scrolled = window.scrollY > 85;
        showScrollTop = window.scrollY > 500;
    });"
    :class="theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches) ? 'dark' : ''">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ __('pages.lander.meta.description') }}">
    <title>{{ __('pages.lander.meta.title') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-200">

<nav id="navbar"
    class="fixed top-2 left-1/2 -translate-x-1/2 z-50 transition-all duration-300 rounded-full w-[75%] max-w-7xl"
    :class="{
        'bg-white/70 dark:bg-gray-800/70 backdrop-blur-md shadow-lg border border-gray-200 dark:border-gray-700 px-6 py-3': scrolled,
        'bg-transparent border-transparent px-8 py-4': !scrolled
    }"
>
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <a href="/" class="flex items-center space-x-2">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>

        <div class="hidden lg:flex items-center space-x-8">
            <a href="#features"
               class="text-sm font-medium transition-colors"
               :class="scrolled ? 'text-gray-700 dark:text-gray-300 hover:text-brand-600 dark:hover:text-brand-400' : 'text-white hover:text-white/80'">
                Features
            </a>
            <a href="#how-it-works"
               class="text-sm font-medium transition-colors"
               :class="scrolled ? 'text-gray-700 dark:text-gray-300 hover:text-brand-600 dark:hover:text-brand-400' : 'text-white hover:text-white/80'">
                How It Works
            </a>
            <a href="#integrations"
               class="text-sm font-medium transition-colors"
               :class="scrolled ? 'text-gray-700 dark:text-gray-300 hover:text-brand-600 dark:hover:text-brand-400' : 'text-white hover:text-white/80'">
                Integrations
            </a>
            <a href="#pricing"
               class="text-sm font-medium transition-colors"
               :class="scrolled ? 'text-gray-700 dark:text-gray-300 hover:text-brand-600 dark:hover:text-brand-400' : 'text-white hover:text-white/80'">
                Pricing
            </a>
            <a href="#faq"
               class="text-sm font-medium transition-colors"
               :class="scrolled ? 'text-gray-700 dark:text-gray-300 hover:text-brand-600 dark:hover:text-brand-400' : 'text-white hover:text-white/80'">
                FAQ
            </a>
        </div>

        <div class="flex items-center space-x-3">
            <div class="hidden sm:flex items-center space-x-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 text-sm font-medium rounded-full shadow-sm transition-all duration-200"
                       :class="scrolled ? 'bg-brand-600 hover:bg-brand-700 text-white border-transparent' : 'bg-white/20 hover:bg-white/30 backdrop-blur-sm border border-white/30 text-white'">
                        Dashboard
                    </a>
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 text-sm font-medium transition-colors"
                       :class="scrolled ? 'text-gray-700 dark:text-gray-300 hover:text-brand-600 dark:hover:text-brand-400' : 'text-white hover:text-white/80'">
                        {{ __('auth.login') }}
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-4 py-2 text-sm font-medium rounded-full shadow-sm transition-all duration-200"
                       :class="scrolled ? 'bg-brand-600 hover:bg-brand-700 text-white' : 'bg-white/20 hover:bg-white/30 backdrop-blur-sm border border-white/30 text-white'">
                        {{ __('auth.register') }}
                    </a>
                @endguest
            </div>

            <div x-data="{ open: false }" @click.away="open = false" class="relative">
                <button @click="open = ! open"
                        class="p-2 rounded-full shadow-sm hover:shadow-md transition-all"
                        :class="scrolled ? 'bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700' : 'bg-white/20 backdrop-blur-sm border border-white/30 text-white'">
                    <img src="{{ asset('img/locales/' . app()->getLocale() . '.png') }}" alt="{{ strtoupper(app()->getLocale()) }}" class="h-5 w-7 rounded-full">
                </button>

                <div x-show="open"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute z-50 mt-2 rounded-2xl shadow-lg w-32 right-0
                            origin-top-right bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 focus:outline-none border border-gray-200 dark:border-gray-700"
                    style="display: none;">
                    <div class="py-1">
                        @foreach (config('app.locales') as $locale => $name)
                            <a href="{{ route('locale.set', $locale) }}"
                               class="flex items-center px-4 py-2 text-sm leading-5 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 transition duration-150 ease-in-out rounded-xl">
                                <img src="{{ asset('img/locales/' . $locale . '.png') }}" alt="{{ $name }}" class="h-4 w-6 me-2 rounded-sm">
                                <span>{{ $name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <button @click="theme = (theme === 'dark' ? 'light' : (theme === 'light' ? 'system' : 'dark'))"
                    class="p-2 rounded-full shadow-sm hover:shadow-md transition-all"
                    :class="scrolled ? 'bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700' : 'bg-white/20 backdrop-blur-sm border border-white/30 text-white'">
                <svg x-show="theme === 'system'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <svg x-show="theme === 'light'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <svg x-show="theme === 'dark'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
            </button>

            <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden p-2 rounded-full shadow-sm hover:shadow-md transition-all"
                    :class="scrolled ? 'bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700' : 'bg-white/20 backdrop-blur-sm border border-white/30 text-white'">
                <svg x-show="!mobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
</nav>

<div x-show="mobileMenuOpen"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 translate-y-1"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-1"
     @click.away="mobileMenuOpen = false"
     class="lg:hidden fixed top-20 left-1/2 -translate-x-1/2 z-40 w-[calc(100%-2rem)] max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 py-4"
     style="display: none;">
    <div class="flex flex-col space-y-1 px-4">
        <a href="#features" @click="mobileMenuOpen = false" class="px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
            Features
        </a>
        <a href="#how-it-works" @click="mobileMenuOpen = false" class="px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
            How It Works
        </a>
        <a href="#integrations" @click="mobileMenuOpen = false" class="px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
            Integrations
        </a>
        <a href="#pricing" @click="mobileMenuOpen = false" class="px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
            Pricing
        </a>
        <a href="#faq" @click="mobileMenuOpen = false" class="px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
            FAQ
        </a>

        @auth
            <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-700 space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-4 py-3 bg-brand-600 hover:bg-brand-700 text-white text-sm font-medium text-center rounded-lg transition-colors">
                    Dashboard
                </a>
            </div>
        @endauth
        @guest
            <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-700 space-y-2">
                <a href="{{ route('login') }}" class="block px-4 py-3 text-sm font-medium text-center text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                    {{ __('auth.login') }}
                </a>
                <a href="{{ route('register') }}" class="block px-4 py-3 bg-brand-600 hover:bg-brand-700 text-white text-sm font-medium text-center rounded-lg transition-colors">
                    {{ __('auth.register') }}
                </a>
            </div>
        @endguest
    </div>
</div>

<button x-show="showScrollTop"
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4"
        class="fixed bottom-8 right-8 z-50 p-3 bg-brand-600 hover:bg-brand-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-200 group"
        style="display: none;">
    <svg class="w-6 h-6 transform group-hover:-translate-y-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>

<div>
@include('pages.lander._hero')
@include('pages.lander._features')
@include('pages.lander._stats')
@include('pages.lander._how-it-works')
@include('pages.lander._ready-cta')
</div>

<footer class="py-12 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-4">Company</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="/" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#features" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Features
                        </a>
                    </li>
                    <li>
                        <a href="#pricing" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Pricing
                        </a>
                    </li>
                    <li>
                        <a href="/status" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Status
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-4">Product</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="/dashboard" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#integrations" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Integrations
                        </a>
                    </li>
                    <li>
                        <a href="#faq" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="/sitemap" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Sitemap
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-4">Legal</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="/legal/terms" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Terms of Service
                        </a>
                    </li>
                    <li>
                        <a href="/legal/privacy" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="/legal/cookies" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Cookies Policy
                        </a>
                    </li>
                    <li>
                        <a href="/legal/imprint" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Imprint
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-4">Connect</h3>
                <div class="flex items-center space-x-4 mb-4">
                    <a href="https://github.com" target="_blank" rel="noopener noreferrer"
                       class="p-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                        <svg class="w-5 h-5 text-gray-700 dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                        </svg>
                    </a>

                    <a href="https://twitter.com" target="_blank" rel="noopener noreferrer"
                       class="p-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 rounded-lg transition-colors group">
                        <svg class="w-5 h-5 text-gray-700 dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Follow us for updates and news
                </p>
            </div>
        </div>

        <div class="pt-8 border-t border-gray-200 dark:border-gray-700">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="text-center md:text-left text-gray-600 dark:text-gray-400">
                    <p>&copy; {{ date('Y') }} GetSocials.link. All rights reserved.</p>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="/" class="flex items-center space-x-2">
                        <x-application-logo class="block h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>