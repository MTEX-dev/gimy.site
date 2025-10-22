<footer class="bg-gray-100 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center md:text-left">
                <a href="{{ route('dashboard') }}" class="flex items-center justify-center md:justify-start">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-800 dark:text-gray-200"/>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                    &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                </p>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">
                    -- -- --
                </h3>
                <ul class="mt-4 space-y-2">
                    <li>
                        <a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                            -----
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                            -----
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">
                    ---
                </h3>
                <ul class="mt-4 space-y-2">
                    <li>
                        <a href="{{ route('pages.sitemap') }}" class="text-base text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                            {{ __('pages.sitemap.meta.title') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">
                    Legal
                </h3>
                <ul class="mt-4 space-y-2">
                    @foreach(config('app.legal_sections') as $section)
                        <li>
                            <a href="{{ route('pages.legal', $section) }}" class="text-base text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                                {{ __('pages.legal.'.$section.'.title') }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6 text-center text-sm text-gray-500 dark:text-gray-400">
            Built with ❤️ by You
        </div>

        <div class="mt-6 flex justify-center">
            @include('components.theme-switcher')
        </div>
    </div>
</footer>