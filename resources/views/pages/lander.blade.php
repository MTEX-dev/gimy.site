<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ theme: localStorage.getItem('theme') || 'system', scrolled: false, mobileMenuOpen: false, showScrollTop: false }"
    x-init="
        $watch('theme', val => {
            localStorage.setItem('theme', val);
            if (val === 'dark' || (val === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
        const onScroll = () => {
            scrolled = window.scrollY > 125;
            showScrollTop = window.scrollY > 500;
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    "
    :class="theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches) ? 'dark' : ''"
>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="description"
            content="{{ __('pages.lander.meta.description') }}"
        />
        <title>{{ __('pages.lander.meta.title') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body
        class="bg-gray-50 text-gray-900 transition-colors duration-200 dark:bg-gray-950 dark:text-gray-100"
        @keydown.escape.window="mobileMenuOpen = false"
    >
        <nav
            id="navbar"
            class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
            :class="{
                'bg-white/40 dark:bg-gray-950/50 backdrop-blur-lg shadow-md border-b border-gray-200 dark:border-gray-800': scrolled,
                'border-b border-transparent': !scrolled
            }"
        >
            <div
                class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8"
            >
                <a href="/" class="flex items-center space-x-2">
                    <x-application-logo
                        class="block h-9 w-auto fill-current text-gimysite-600 dark:text-gimysite-400"
                    />
                </a>

                <div class="hidden items-center space-x-8 lg:flex">
                    <a href="#features" class="nav-link">Features</a>
                    <a href="#how-it-works" class="nav-link">How It Works</a>
                    <a href="#integrations" class="nav-link">Integrations</a>
                    <a href="#pricing" class="nav-link">Pricing</a>
                    <a href="#faq" class="nav-link">FAQ</a>
                </div>

                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="hidden items-center space-x-3 sm:flex">
                        @auth
                            <a
                                href="{{ route('dashboard') }}"
                                class="nav-button-primary"
                            >
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link"
                                >{{ __('auth.log_in') }}</a
                            >
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md bg-gimysite-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition-colors duration-200 hover:bg-gimysite-700 focus:outline-none focus:ring-2 focus:ring-gimysite-500 focus:ring-offset-2 dark:bg-gimysite-500 dark:hover:bg-gimysite-600 dark:focus:ring-offset-gray-900"
                                >{{ __('auth.register') }}</a
                            >
                        @endguest
                    </div>

                    @include('components.locale-switcher')
                    @include('components.theme-toggle')

                    <button
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        class="z-50 p-2 text-gray-700 transition-colors dark:text-gray-300 lg:hidden"
                        aria-label="Toggle Menu"
                    >
                        <svg
                            x-show="!mobileMenuOpen"
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"
                            />
                        </svg>
                        <svg
                            x-show="mobileMenuOpen"
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>

        <div
            x-show="mobileMenuOpen"
            x-transition:enter="duration-300 ease-out"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="duration-200 ease-in"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-40 bg-gray-900/50 backdrop-blur-lg lg:hidden"
            style="display: none"
        >
            <div
                class="flex h-full flex-col items-center justify-center space-y-6 text-center"
            >
                <a href="#features" @click="mobileMenuOpen = false" class="mobile-nav-link">Features</a>
                <a href="#how-it-works" @click="mobileMenuOpen = false" class="mobile-nav-link">How It Works</a>
                <a href="#integrations" @click="mobileMenuOpen = false" class="mobile-nav-link">Integrations</a>
                <a href="#pricing" @click="mobileMenuOpen = false" class="mobile-nav-link">Pricing</a>
                <a href="#faq" @click="mobileMenuOpen = false" class="mobile-nav-link">FAQ</a>
                <div class="w-48 border-t border-gray-200/20 pt-8"></div>
                @auth
                    <a href="{{ route('dashboard') }}" class="mobile-nav-button">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" @click="mobileMenuOpen = false" class="mobile-nav-link">{{ __('auth.log_in') }}</a>
                    <a href="{{ route('register') }}" class="mobile-nav-button">{{ __('auth.register') }}</a>
                @endguest
            </div>
        </div>

        <main>
            @include('pages.lander._hero')
            @include('pages.lander._features')
            @include('pages.lander._stats')
            @include('pages.lander._how-it-works')
            @include('pages.lander._ready-cta')
        </main>

        <footer
            class="relative overflow-hidden border-t border-gray-200 bg-gray-50 py-16 dark:border-gray-800 dark:bg-gray-950"
        >
            <div
                class="absolute inset-0 opacity-10 [mask-image:radial-gradient(ellipse_at_center,white_20%,transparent_70%)]"
            >
                <div
                    class="absolute inset-0 bg-[radial-gradient(#ddd_1px,transparent_1px)] [background-size:32px_32px] dark:bg-[radial-gradient(#333_1px,transparent_1px)]"
                ></div>
            </div>
            <div class="relative z-10 mx-auto max-w-7xl px-6">
                <div
                    class="mb-12 grid grid-cols-2 gap-8 md:grid-cols-4 lg:grid-cols-5"
                >
                    <div class="col-span-2 lg:col-span-1">
                        <a href="/" class="mb-4 inline-block">
                            <x-application-logo
                                class="block h-10 w-auto fill-current text-gimysite-600 dark:text-gimysite-400"
                            />
                        </a>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            &copy; {{ date('Y') }} Gimy.Site. All rights
                            reserved.
                        </p>
                    </div>
                    <div>
                        <h3
                            class="footer-heading text-gray-700 dark:text-gray-300"
                        >
                            Product
                        </h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="#features" class="footer-link"
                                    >Features</a
                                >
                            </li>
                            <li>
                                <a href="#how-it-works" class="footer-link"
                                    >How It Works</a
                                >
                            </li>
                            <li>
                                <a href="#pricing" class="footer-link"
                                    >Pricing</a
                                >
                            </li>
                            <li>
                                <a href="/status" class="footer-link"
                                    >Status</a
                                >
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3
                            class="footer-heading text-gray-700 dark:text-gray-300"
                        >
                            Company
                        </h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="#about" class="footer-link"
                                    >About Us</a
                                >
                            </li>
                            <li>
                                <a href="/blog" class="footer-link">Blog</a>
                            </li>
                            <li>
                                <a href="/contact" class="footer-link"
                                    >Contact</a
                                >
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3
                            class="footer-heading text-gray-700 dark:text-gray-300"
                        >
                            Legal
                        </h3>
                        <ul class="space-y-3">
                            @foreach(config('app.legal_sections') as $section)
                            <li>
                                <a href="{{ route('pages.legal', $section) }}" class="footer-link">{{ __('pages.legal.'.$section.'.title')}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h3
                            class="footer-heading text-gray-700 dark:text-gray-300"
                        >
                            Connect
                        </h3>
                        <div class="flex items-center space-x-3">
                            <a
                                href="https://github.com"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="social-icon text-gray-600 hover:text-gimysite-600 dark:text-gray-400 dark:hover:text-gimysite-400"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://twitter.com"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="social-icon text-gray-600 hover:text-gimysite-600 dark:text-gray-400 dark:hover:text-gimysite-400"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <button
            x-show="showScrollTop"
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            x-transition
            class="group fixed bottom-8 right-8 z-50 rounded-full bg-gimysite-600 p-3 text-white shadow-lg transition-all duration-300 hover:scale-110 hover:bg-gimysite-700"
            style="display: none"
            aria-label="Scroll to top"
        >
            <svg
                class="h-6 w-6 transform transition-transform duration-300 group-hover:-translate-y-1"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 15l7-7 7 7"
                />
            </svg>
        </button>
    </body>
</html>