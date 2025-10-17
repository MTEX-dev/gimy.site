<!DOCTYPE html>
<html lang="en" x-data="{ theme: localStorage.getItem('theme') || 'system' }" 
    x-init="$watch('theme', val => {
        localStorage.setItem('theme', val);
        if (val === 'dark' || (val === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    })"
    :class="theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches) ? 'dark' : ''">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ __('pages.lander.meta.description') }}">
    <title>{{ __('pages.lander.meta.title') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-200">

<div class="fixed top-6 right-6 z-50" x-data="{ open: false }">
    <div class="relative">
        <button @click="open = !open" class="p-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg hover:shadow-xl transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
        </button>
        
        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-36 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-xl overflow-hidden">
            <button @click="theme = 'light'; open = false" class="w-full px-4 py-3 text-left hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors" :class="theme === 'light' ? 'bg-brand-50 dark:bg-brand-900/20 text-brand-600 dark:text-brand-400' : ''">
                Light
            </button>
            <button @click="theme = 'dark'; open = false" class="w-full px-4 py-3 text-left hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors" :class="theme === 'dark' ? 'bg-brand-50 dark:bg-brand-900/20 text-brand-600 dark:text-brand-400' : ''">
                Dark
            </button>
            <button @click="theme = 'system'; open = false" class="w-full px-4 py-3 text-left hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors" :class="theme === 'system' ? 'bg-brand-50 dark:bg-brand-900/20 text-brand-600 dark:text-brand-400' : ''">
                System
            </button>
        </div>
    </div>
</div>

<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-brand-600 dark:bg-brand-800"></div>
    
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)"/>
        </svg>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center text-white">
        <h1 class="text-5xl md:text-7xl font-bold mb-4">
            {{ __('pages.lander.hero.title') }}
        </h1>
        <p class="text-2xl md:text-3xl font-semibold mb-3">
            {{ __('pages.lander.hero.headline') }}
        </p>
        <p class="text-lg md:text-xl mb-12 opacity-90">
            {{ __('pages.lander.hero.subheadline') }}
        </p>

        <form class="max-w-xl mx-auto" x-data="{ username: '' }">
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-1 relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-medium">
                        getsocials.link/
                    </span>
                    <input 
                        type="text" 
                        x-model="username"
                        placeholder="{{ __('pages.lander.hero.placeholder') }}"
                        class="w-full pl-40 pr-4 py-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 border-2 border-transparent focus:border-brand-400 rounded-lg text-lg outline-none transition-all"
                    >
                </div>
                <button type="submit" class="px-8 py-4 bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-semibold rounded-lg hover:bg-gray-800 dark:hover:bg-gray-100 transition-colors">
                    {{ __('pages.lander.hero.cta') }}
                </button>
            </div>
            <p class="text-sm mt-3 opacity-75">
                {{ __('pages.lander.hero.validation_message') }}
            </p>
        </form>
    </div>
</section>

<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                {{ __('pages.lander.features.title') }}
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">
                {{ __('pages.lander.features.subheadline') }}
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach(range(1, 6) as $i)
            <div class="bg-white dark:bg-gray-900 p-8 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-brand-500 dark:hover:border-brand-500 transition-all">
                <div class="w-12 h-12 bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 rounded-lg flex items-center justify-center mb-4">
                    @if($i === 1)
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    @elseif($i === 2)
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                    @elseif($i === 3)
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    @elseif($i === 4)
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    @elseif($i === 5)
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    @else
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    @endif
                </div>
                <h3 class="text-xl font-bold mb-3">
                    {{ __("pages.lander.features.{$i}.title") }}
                </h3>
                <p class="text-gray-600 dark:text-gray-400">
                    {{ __("pages.lander.features.{$i}.description") }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-16 bg-brand-600 dark:bg-brand-800 text-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">
            {{ __('pages.lander.stats.title') }}
        </h2>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach(range(1, 4) as $i)
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">
                    {{ __("pages.lander.stats.{$i}.value") }}
                </div>
                <div class="text-lg opacity-90">
                    {{ __("pages.lander.stats.{$i}.description") }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-white dark:bg-gray-900">
    <div class="max-w-5xl mx-auto px-6">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
            {{ __('pages.lander.how_it_works.title') }}
        </h2>

        <div class="space-y-12">
            @foreach(range(1, 4) as $i)
            <div class="flex gap-6 items-start">
                <div class="flex-shrink-0 w-16 h-16 bg-brand-600 dark:bg-brand-700 text-white rounded-full flex items-center justify-center text-2xl font-bold">
                    {{ $i }}
                </div>
                <div class="flex-1 pt-2">
                    <h3 class="text-2xl font-bold mb-2">
                        {{ __("pages.lander.how_it_works.steps.{$i}.title") }}
                    </h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                        {{ __("pages.lander.how_it_works.steps.{$i}.description") }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                {{ __('pages.lander.integrations.title') }}
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">
                {{ __('pages.lander.integrations.subheadline') }}
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach(range(1, 5) as $i)
            <div class="bg-white dark:bg-gray-900 p-6 rounded-xl border border-gray-200 dark:border-gray-700 text-center hover:border-brand-500 dark:hover:border-brand-500 transition-all">
                <div class="w-16 h-16 bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/></svg>
                </div>
                <h3 class="font-bold mb-2">
                    {{ __("pages.lander.integrations.{$i}.name") }}
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __("pages.lander.integrations.{$i}.description") }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-white dark:bg-gray-900">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
            {{ __('pages.lander.testimonials.title') }}
        </h2>

        <div class="grid md:grid-cols-2 gap-8">
            @foreach(range(1, 2) as $i)
            <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-xl border border-gray-200 dark:border-gray-700">
                <svg class="w-10 h-10 text-brand-600 dark:text-brand-400 mb-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/></svg>
                <p class="text-lg mb-6 leading-relaxed">
                    {{ __("pages.lander.testimonials.{$i}.quote") }}
                </p>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-brand-200 dark:bg-brand-800 rounded-full"></div>
                    <div>
                        <div class="font-bold">
                            {{ __("pages.lander.testimonials.{$i}.author") }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">
                            {{ __("pages.lander.testimonials.{$i}.role") }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                {{ __('pages.lander.pricing.title') }}
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">
                {{ __('pages.lander.pricing.subheadline') }}
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="bg-white dark:bg-gray-900 p-8 rounded-xl border-2 border-gray-200 dark:border-gray-700">
                <div class="text-sm font-bold text-brand-600 dark:text-brand-400 mb-2">
                    {{ __('pages.lander.pricing.free_plan_headline') }}
                </div>
                <div class="text-4xl font-bold mb-6">Free</div>
                <ul class="space-y-3 mb-8">
                    @foreach(__('pages.lander.pricing.free_plan_features') as $feature)
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-brand-600 dark:text-brand-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                <button class="w-full py-3 border-2 border-brand-600 dark:border-brand-500 text-brand-600 dark:text-brand-400 font-semibold rounded-lg hover:bg-brand-50 dark:hover:bg-brand-900/20 transition-colors">
                    Get Started
                </button>
            </div>

            <div class="bg-brand-600 dark:bg-brand-700 text-white p-8 rounded-xl border-2 border-brand-700 dark:border-brand-600">
                <div class="text-sm font-bold mb-2">
                    {{ __('pages.lander.pricing.pro_plan_headline') }}
                </div>
                <div class="text-4xl font-bold mb-2">$9<span class="text-lg">/month</span></div>
                <div class="text-sm opacity-90 mb-6">
                    {{ __('pages.lander.pricing.pro_plan_description') }}
                </div>
                <ul class="space-y-3 mb-8">
                    @foreach(__('pages.lander.pricing.pro_plan_features') as $feature)
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                <button class="w-full py-3 bg-white text-brand-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                    {{ __('pages.lander.pricing.cta') }}
                </button>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white dark:bg-gray-900">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
            {{ __('pages.lander.faq.title') }}
        </h2>

        <div class="space-y-4" x-data="{ active: null }">
            @foreach(range(1, 5) as $i)
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <button @click="active = active === {{ $i }} ? null : {{ $i }}" class="w-full px-6 py-4 text-left font-semibold flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <span>{{ __("pages.lander.faq.{$i}.question") }}</span>
                    <svg class="w-5 h-5 transition-transform" :class="active === {{ $i }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === {{ $i }}" x-collapse class="px-6 pb-4 text-gray-600 dark:text-gray-400">
                    {{ __("pages.lander.faq.{$i}.answer") }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-brand-600 dark:bg-brand-800 text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-4">
            {{ __('pages.lander.cta_bottom.headline') }}
        </h2>
        <p class="text-xl mb-8 opacity-90">
            {{ __('pages.lander.cta_bottom.subheadline') }}
        </p>
        <button class="px-8 py-4 bg-white text-brand-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors text-lg">
            {{ __('pages.lander.cta_bottom.call_to_action') }}
        </button>
    </div>
</section>

<footer class="py-12 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center text-gray-600 dark:text-gray-400">
            <p>&copy; {{ date('Y') }} GetSocials.link. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>