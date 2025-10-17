<footer class="bg-gray-100 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            <!-- Logo & Company Info -->
            <div class="text-center md:text-left">
                <a href="{{ route('dashboard') }}" class="flex items-center justify-center md:justify-start">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                    &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                </p>
            </div>

            <!-- Section 1 -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">Section 1</h3>
                <ul class="mt-4 space-y-2">
                    <li>
                        <a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                            Link One
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                            Link Two
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Section 2 -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">Section 2</h3>
                <ul class="mt-4 space-y-2">
                    <li>
                        <a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                            Link A
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                            Link B
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Section 3 -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase tracking-wider">
                    Section 3
                </h3>
                <ul class="mt-4 space-y-2">
                    <li>
                        <a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                            Project X
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-base text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                            Project Y
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Divider -->
        <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6 text-center text-sm text-gray-500 dark:text-gray-400">
            Built with ❤️ by You
        </div>
    </div>
</footer>