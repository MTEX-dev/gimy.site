<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('pages.lander.hero.headline') }} - Getsocials.link</title>
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
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .float-animation { animation: float 6s ease-in-out infinite; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-50 transition-colors duration-300">

    <!-- Theme Toggle -->
    <div class="fixed top-4 right-4 z-50">
        <button id="theme-toggle" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 shadow-md transition-colors duration-300">
            <svg id="moon-icon" class="w-6 h-6 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
            <svg id="sun-icon" class="w-6 h-6 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h1M3 12H2m15.325-7.778l-.707.707M6.364 17.636l-.707.707M16.95 7.05l.707-.707M7.05 16.95l-.707.707M12 8a4 4 0 100 8 4 4 0 000-8z"></path></svg>
        </button>
    </div>

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center px-4 py-20 relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-10 dark:opacity-5">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">
                <defs>
                    <pattern id="gridPattern" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M0 0H60V60H0zM30 0V60M0 30H60" fill="none" stroke="currentColor" stroke-width="0.5" stroke-opacity="0.1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#gridPattern)" />
            </svg>
        </div>

        <div class="max-w-6xl mx-auto text-center relative z-10">
            <div class="mb-6 inline-block px-4 py-2 bg-primary-100 dark:bg-primary-900/50 rounded-full border border-primary-200 dark:border-primary-800">
                <span class="text-sm font-semibold text-primary-700 dark:text-primary-300">{{ __('pages.lander.hero.section_title') }}</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight text-gray-900 dark:text-white">
                {{ __('pages.lander.hero.headline') }}
            </h1>

            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-12 max-w-3xl mx-auto">
                {{ __('pages.lander.hero.subheadline') }}
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#signup" class="px-8 py-4 bg-primary-600 text-white rounded-full font-bold text-lg hover:bg-primary-700 transform transition-all shadow-lg hover:shadow-primary-300/50">
                    {{ __('pages.lander.hero.cta') }}
                </a>
                <a href="#features" class="px-8 py-4 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-full font-bold text-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-all border border-gray-200 dark:border-gray-700">
                    {{ __('pages.lander.hero.secondary') }}
                </a>
            </div>

            <div class="mt-16 float-animation">
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 max-w-2xl mx-auto shadow-xl">
                    <div class="space-y-3">
                        @for ($i = 1; $i <= 3; $i++)
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 hover:bg-gray-200 dark:hover:bg-gray-600 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-primary-500 rounded-full"></div>
                                <div class="flex-1 bg-gray-300 dark:bg-gray-500 h-6 rounded"></div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900 dark:text-white">{{ __('pages.lander.stats.title') }}</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @php
                    $stats = ['1M+', '50M+', '99.9%', '4.9/5'];
                @endphp
                @for ($i = 1; $i <= 4; $i++)
                <div class="text-center p-6 bg-white dark:bg-gray-700 rounded-2xl border border-gray-200 dark:border-gray-700 hover:scale-105 transition-transform shadow-sm dark:shadow-none">
                    <div class="text-4xl md:text-5xl font-bold text-primary-600 dark:text-primary-400 mb-2">{{ $stats[$i-1] }}</div>
                    <div class="text-gray-600 dark:text-gray-300">{{ __('pages.lander.stats.' . $i) }}</div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('pages.lander.features.section_title') }}</h2>
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
                @for ($i = 0; $i < 6; $i++)
                <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-primary-500 transition-all hover:scale-105 group shadow-sm dark:shadow-none">
                    <div class="w-14 h-14 bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-400 rounded-xl mb-6 flex items-center justify-center text-2xl group-hover:rotate-6 transition-transform">
                        {!! $featureIcons[$i] !!}
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('pages.lander.features.' . ($i+1) . '.title') }}</h3>
                    <p class="text-gray-600 dark:text-gray-300">{{ __('pages.lander.features.' . ($i+1) . '.description') }}</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 text-gray-900 dark:text-white">{{ __('pages.lander.how_it_works.section_title') }}</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @for ($i = 1; $i <= 4; $i++)
                <div class="relative">
                    <div class="bg-white dark:bg-gray-700 p-8 rounded-2xl border border-gray-200 dark:border-gray-700 hover:border-primary-500 transition-all shadow-sm dark:shadow-none">
                        <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-400 rounded-full flex items-center justify-center font-bold text-xl mb-6">
                            {{ $i }}
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ __('pages.lander.how_it_works.step_' . $i . '_title') }}</h3>
                        <p class="text-gray-600 dark:text-gray-300">{{ __('pages.lander.how_it_works.step_' . $i . '_description') }}</p>
                    </div>
                    @if ($i < 4)
                    <div class="hidden lg:block absolute top-1/2 left-[calc(100%+16px)] transform -translate-y-1/2 w-8 h-0.5 bg-gray-300 dark:bg-gray-600"></div>
                    <div class="hidden lg:block absolute top-1/2 -right-4 w-8 h-0.5 bg-gray-300 dark:bg-gray-600 transform -translate-x-1/2"></div>
                    @endif
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 text-gray-900 dark:text-white">{{ __('pages.lander.testimonials.section_title') }}</h2>

            <div class="grid md:grid-cols-2 gap-8">
                @for ($i = 1; $i <= 2; $i++)
                <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm dark:shadow-none">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-400 rounded-full flex items-center justify-center font-bold text-xl mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V9a2 2 0 012-2h10a2 2 0 012 2v6a2 2 0 01-2 2H7z"></path></svg>
                    </div>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-6 italic">"{{ __('pages.lander.testimonials.testimonial_' . $i . '_quote') }}"</p>
                    <p class="font-semibold text-primary-600 dark:text-primary-400">{{ __('pages.lander.testimonials.testimonial_' . $i . '_author') }}</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 px-4 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 text-gray-900 dark:text-white">{{ __('pages.lander.faq.section_title') }}</h2>

            <div class="space-y-4">
                @for ($i = 1; $i <= 5; $i++)
                <details class="bg-white dark:bg-gray-700 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden group shadow-sm dark:shadow-none">
                    <summary class="p-6 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-600 transition-all font-semibold text-lg flex justify-between items-center text-gray-900 dark:text-white">
                        {{ __('pages.lander.faq.question_' . $i) }}
                        <span class="text-2xl transform transition-transform group-open:rotate-180">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <div class="px-6 pb-6 text-gray-600 dark:text-gray-300">
                        {{ __('pages.lander.faq.answer_' . $i) }}
                    </div>
                </details>
                @endfor
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section id="signup" class="py-20 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-white dark:bg-gray-800 rounded-3xl p-12 border border-gray-200 dark:border-gray-700 shadow-xl dark:shadow-none">
                <h2 class="text-3xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('pages.lander.cta_bottom.headline') }}</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">{{ __('pages.lander.cta_bottom.subheadline') }}</p>
                <a href="#" class="inline-block px-10 py-5 bg-primary-600 text-white rounded-full font-bold text-xl hover:bg-primary-700 transform transition-all shadow-lg hover:shadow-primary-300/50">
                    {{ __('pages.lander.cta_bottom.call_to_action') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 px-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto text-center text-gray-500 dark:text-gray-400">
            <p>&copy; 2025 Getsocials.link. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggle = document.getElementById('theme-toggle');
            const htmlTag = document.documentElement;

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
        });
    </script>
</body>
</html>