@extends('layouts.app', ['hideFooter' => true])
@section('title', __('pages.legal.' . $section . '.title') . ' - ' . config('app.name'))

@section('content')
<div class="container mx-auto px-4 py-8 lg:py-16 max-w-6xl">
    <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
        <!-- Navigation -->
        <nav class="w-full lg:w-1/4 bg-white dark:bg-gray-800 shadow-md rounded-lg p-3 h-fit lg:sticky lg:top-20">
            <ul class="space-y-2">
                @foreach($validSections as $validSection)
                    <li>
                        <a href="{{ route('pages.legal', ['section' => $validSection]) }}"
                           class="block text-base text-gray-700 dark:text-gray-300 hover:text-brand-600 dark:hover:text-brand-400 transition-colors py-1.5 px-3 rounded-md
                           @if ($section === $validSection) bg-brand-100 dark:bg-brand-700 text-brand-700 dark:text-brand-100 font-semibold @endif">
                            {{ __('pages.legal.' . $validSection . '.title') }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <!-- Content -->
        <div class="w-full lg:w-3/4 bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 sm:p-6 lg:p-8">
            <div class="mb-4">
                <h1 class="text-gray-900 dark:text-gray-100 text-2xl sm:text-3xl font-bold">
                    {{ __('pages.legal.' . $section . '.title') }}
                </h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-2">
                    {{ __('pages.legal.last_updated') }}
                    {{ __('pages.legal.' . $section . '.last_updated') }}
                </p>
            </div>

            <div class="overflow-y-auto max-h-none lg:max-h-[70vh] lg:pr-4">
                <article class="prose prose-sm sm:prose dark:prose-invert prose-brand max-w-none">
                    <div class="text-gray-800 dark:text-gray-200">
                        @markdown(__('pages.legal.' . $section . '.content'))
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="container mx-auto px-4 mt-8 max-w-6xl">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4 sm:p-6 lg:p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-4">Company</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="/" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Home
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
                        <a href="/sitemap" class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                            Sitemap
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-4">Legal</h3>
                <ul class="space-y-2">
                    @foreach($validSections as $validSection)
                        <li>
                            <a href="{{ route('pages.legal', ['section' => $validSection]) }}"
                               class="text-gray-600 dark:text-gray-400 hover:text-brand-600 dark:hover:text-brand-400 transition-colors">
                                {{ __('pages.legal.' . $validSection . '.title') }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mt-8 lg:mt-12 text-center text-gray-500 dark:text-gray-400 text-sm">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</footer>
@endsection