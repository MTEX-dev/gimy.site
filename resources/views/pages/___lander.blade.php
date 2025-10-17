<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('pages.lander.meta.title') }}</title>
    <meta name="description" content="{{ __('pages.lander.meta.description') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff', 100: '#e0f2fe', 200: '#bae6fd', 300: '#7dd3fc', 400: '#38bdf8',
                            500: '#0ea5e9', 600: '#0284c7', 700: '#0369a1', 800: '#075985', 900: '#0c4a6e',
                            950: '#082f49'
                        },
                        secondary: {
                            50: '#fdf2f8', 100: '#fce7f3', 200: '#fbcfe8', 300: '#f9a8d4', 400: '#f472b6',
                            500: '#ec4899', 600: '#db2777', 700: '#be185d', 800: '#9d174d', 900: '#831843',
                            950: '#500724'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .grid-bg {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(0,0,0,0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(0,0,0,0.05) 1px, transparent 1px);
        }
        .dark .grid-bg {
            background-image: linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-50 transition-colors duration-300">

    <div class="fixed top-4 right-4 z-50">
        <button id="theme-toggle" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 shadow-md transition-colors duration-300 hover:scale-105">
            <svg id="moon-icon" class="w-6 h-6 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
            <svg id="sun-icon" class="w-6 h-6 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h1M3 12H2m15.325-7.778l-.707.707M6.364 17.636l-.707.707M16.95 7.05l.707-.707M7.05 16.95l-.707.707M12 8a4 4 0 100 8 4 4 0 000-8z"></path></svg>
        </button>
    </div>

    <section class="min-h-screen flex items-center justify-center px-4 py-20 relative overflow-hidden grid-bg">
        <div class="absolute inset-0 z-0 opacity-10 dark:opacity-5"></div>

        <div class="max-w-6xl mx-auto text-center relative z-10">
            <div class="mb-6 inline-block px-4 py-2 bg-primary-100 dark:bg-primary-900/50 rounded-full border border-primary-200 dark:border-primary-800 animate-fade-in-down">
                <span class="text-sm font-semibold text-primary-700 dark:text-primary-300">{{ __('pages.lander.hero.section_title') }}</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight text-gray-900 dark:text-white animate-fade-in-up">
                {{ __('pages.lander.hero.headline') }}
            </h1>

            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-10 max-w-3xl mx-auto animate-fade-in-up delay-200">
                {{ __('pages.lander.hero.subheadline') }}
            </p>

            <form id="create-link-form" class="mb-16 max-w-xl mx-auto flex flex-col sm:flex-row gap-4 animate-fade-in-up delay-400">
                <div class="relative flex-1">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">getsocials.link/</span>
                    <input type="text" id="username-input" name="username" placeholder="{{ __('pages.lander.hero.placeholder') }}"
                           class="w-full pl-[130px] pr-4 py-4 rounded-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                                  focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-lg shadow-inner
                                  text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"
                           minlength="3" pattern="^[a-z0-9](?:[a-z0-9-]{0,28}[a-z0-9])?$"
                           title="{{ __('pages.lander.hero.validation_message') }}" required>
                    <p id="username-error" class="text-red-500 text-sm mt-2 hidden text-left"></p>
                </div>
                <button type="submit" class="px-8 py-4 bg-primary-600 text-white rounded-full font-bold text-lg hover:bg-primary-700
                                           transform transition-all shadow-lg hover:shadow-primary-300/50 flex-shrink-0">
                    {{ __('pages.lander.hero.cta') }}
                </button>
            </form>

            <div class="mt-16 relative">
                <img src="https://via.placeholder.com/800x400/BFDBFE/1E40AF?text=Your+GetSocials.link+Page+Mockup" alt="GetSocials.link page mockup"
                     class="max-w-4xl mx-auto rounded-3xl shadow-2xl border-4 border-white dark:border-gray-800 transform hover:scale-102 transition-transform duration-500 float-animation">
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 text-gray-900 dark:text-white">{{ __('pages.lander.stats.section_title') }}</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @php
                    $stats = ['1M+', '50M+', '99.9%', '4.9/5'];
                    $statsDescriptions = [
                        __('pages.lander.stats.1.description'),
                        __('pages.lander.stats.2.description'),
                        __('pages.lander.stats.3.description'),
                        __('pages.lander.stats.4.description')
                    ];
                @endphp
                @for ($i = 0; $i < 4; $i++)
                <div class="text-center p-6 bg-white dark:bg-gray-700 rounded-2xl border border-gray-200 dark:border-gray-700 hover:scale-105 transition-transform shadow-lg dark:shadow-none hover:shadow-primary-200/50">
                    <div class="text-4xl md:text-6xl font-extrabold text-primary-600 dark:text-primary-400 mb-2">{{ $stats[$i] }}</div>
                    <div class="text-lg font-medium text-gray-700 dark:text-gray-300">{{ $statsDescriptions[$i] }}</div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <section id="features" class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('pages.lander.features.section_title') }}</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">{{ __('pages.lander.features.subheadline') }}</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $featureIcons = [
                        '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.135a4 4 0 000-5.656l-4-4a4 4 0 00-5.656 0m18 4l-4-4m-6-6L9.657 9.657"></path></svg>', // Link
                        '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4l2 4h4a2 2 0 012 2v10a2 2 0 01-2 2H7z"></path></svg>', // Customize
                        '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>', // Analytics
                        '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>', // Speed
                        '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6a2 2 0 00-2-2H5a2 2 0 00-2 2v13a2 2 0 002 2h4a2 2 0 002-2zm0 0h10a2 2 0 002-2V6a2 2 0 00-2-2H9m0 0V3m10 4V3m0 0H9"></path></svg>', // SEO
                        '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16v4m-2-2h4M13 17v4m-2-2h4M19 3v4m-2-2h4m0 14v4m-2-2h4M12 9V5l3 3m-3 0l-3-3m0 8h6a2 2 0 012 2v3a2 2 0 01-2 2H8a2 2 0 01-2-2v-3a2 2 0 012-2z"></path></svg>'  // Support
                    ];
                @endphp
                @for ($i = 1; $i <= 6; $i++)
                <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-primary-500 transition-all hover:scale-[1.02] group shadow-lg dark:shadow-none hover:shadow-primary-200/50">
                    <div class="w-14 h-14 bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-400 rounded-xl mb-6 flex items-center justify-center text-2xl group-hover:rotate-6 transition-transform">
                        {!! $featureIcons[$i-1] !!}
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('pages.lander.features.' . $i . '.title') }}</h3>
                    <p class="text-gray-600 dark:text-gray-300">{{ __('pages.lander.features.' . $i . '.description') }}</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="py-20 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 text-gray-900 dark:text-white">{{ __('pages.lander.how_it_works.section_title') }}</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @for ($i = 1; $i <= 4; $i++)
                <div class="relative group">
                    <div class="bg-white dark:bg-gray-700 p-8 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-primary-500 transition-all shadow-lg dark:shadow-none hover:shadow-primary-200/50 h-full flex flex-col justify-start">
                        <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-400 rounded-full flex items-center justify-center font-bold text-xl mb-6 transition-transform group-hover:scale-110">
                            {{ $i }}
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('pages.lander.how_it_works.step_' . $i . '_title') }}</h3>
                        <p class="text-gray-600 dark:text-gray-300">{{ __('pages.lander.how_it_works.step_' . $i . '_description') }}</p>
                    </div>
                    @if ($i < 4)
                    <div class="hidden lg:block absolute top-1/2 right-[-2.5rem] transform -translate-y-1/2 w-20 h-0.5 bg-primary-300 dark:bg-primary-600 rotate-[5deg] group-hover:rotate-0 transition-all"></div>
                    @endif
                </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 text-gray-900 dark:text-white">{{ __('pages.lander.testimonials.section_title') }}</h2>

            <div class="grid md:grid-cols-2 gap-8">
                @for ($i = 1; $i <= 2; $i++)
                <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-lg dark:shadow-none hover:shadow-primary-200/50 transform hover:translate-y-[-5px] transition-all">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-400 rounded-full flex items-center justify-center font-bold text-xl mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V9a2 2 0 012-2h10a2 2 0 012 2v6a2 2 0 01-2 2H7z"></path></svg>
                    </div>
                    <p class="text-xl text-gray-700 dark:text-gray-300 mb-6 italic leading-relaxed">"{{ __('pages.lander.testimonials.' . $i . '.quote') }}"</p>
                    <p class="font-semibold text-lg text-primary-600 dark:text-primary-400">{{ __('pages.lander.testimonials.' . $i . '.author') }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('pages.lander.testimonials.' . $i . '.role') }}</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <section class="py-20 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 text-gray-900 dark:text-white">{{ __('pages.lander.faq.section_title') }}</h2>

            <div class="space-y-4">
                @for ($i = 1; $i <= 5; $i++)
                <details class="bg-white dark:bg-gray-700 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden group shadow-lg dark:shadow-none">
                    <summary class="p-6 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-600 transition-all font-semibold text-lg flex justify-between items-center text-gray-900 dark:text-white">
                        {{ __('pages.lander.faq.' . $i . '.question') }}
                        <span class="text-2xl transform transition-transform group-open:rotate-180 text-primary-600 dark:text-primary-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <div class="px-6 pb-6 text-gray-600 dark:text-gray-300 leading-relaxed">
                        {{ __('pages.lander.faq.' . $i . '.answer') }}
                    </div>
                </details>
                @endfor
            </div>
        </div>
    </section>

    <section id="signup" class="py-20 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-gradient-to-r from-primary-500 to-primary-700 dark:from-primary-700 dark:to-primary-900 rounded-3xl p-12 shadow-xl border border-primary-400 dark:border-primary-600">
                <h2 class="text-3xl md:text-5xl font-bold mb-4 text-white">{{ __('pages.lander.cta_bottom.headline') }}</h2>
                <p class="text-xl text-primary-100 dark:text-primary-200 mb-8">{{ __('pages.lander.cta_bottom.subheadline') }}</p>
                <a href="#" class="inline-block px-10 py-5 bg-white text-primary-600 rounded-full font-bold text-xl hover:bg-gray-100 transform transition-all shadow-lg hover:scale-105">
                    {{ __('pages.lander.cta_bottom.call_to_action') }}
                </a>
            </div>
        </div>
    </section>

    <footer class="py-8 px-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto text-center text-gray-500 dark:text-gray-400 text-sm">
            <p>&copy; 2025 Getsocials.link. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggle = document.getElementById('theme-toggle');
            const htmlTag = document.documentElement;
            const createLinkForm = document.getElementById('create-link-form');
            const usernameInput = document.getElementById('username-input');
            const usernameError = document.getElementById('username-error');

            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                htmlTag.classList.remove('light', 'dark');
                htmlTag.classList.add(savedTheme);
            } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                htmlTag.classList.remove('light');
                htmlTag.classList.add('dark');
            }

            themeToggle.addEventListener('click', () => {
                if (htmlTag.classList.contains('light')) {
                    htmlTag.classList.remove('light');
                    htmlTag.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                } else {
                    htmlTag.classList.remove('dark');
                    htmlTag.classList.add('light');
                    localStorage.setItem('theme', 'light');
                }
            });

            createLinkForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const username = usernameInput.value;
                if (usernameInput.checkValidity()) {
                    window.location.href = `/register?username=${username}`;
                } else {
                    usernameError.textContent = usernameInput.title;
                    usernameError.classList.remove('hidden');
                }
            });

            usernameInput.addEventListener('input', () => {
                if (usernameInput.checkValidity()) {
                    usernameError.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>