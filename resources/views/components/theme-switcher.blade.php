<!-- resources/views/components/theme-switcher.blade.php -->
<div
    x-data="{
        theme: localStorage.getItem('theme') || 'system',
        init() {
            this.setTheme(this.theme);
            this.$watch('theme', value => this.setTheme(value));
        },
        setTheme(theme) {
            if (theme === 'system') {
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } else if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            localStorage.setItem('theme', theme);
        }
    }"
    class="inline-flex rounded-md shadow-sm bg-white dark:bg-gray-700"
    role="group"
>
    <button
        @click="theme = 'system'"
        :class="{ 'bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100': theme === 'system', 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-600': theme !== 'system' }"
        type="button"
        class="px-4 py-2 text-sm font-medium border border-gray-200 dark:border-gray-600 rounded-l-md focus:z-10 focus:ring-2 focus:ring-gimysite-500 focus:border-gimysite-500"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.5"
            class="w-5 h-5"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
            />
        </svg>
        <span class="sr-only">System Theme</span>
    </button>
    <button
        @click="theme = 'light'"
        :class="{ 'bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100': theme === 'light', 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-600': theme !== 'light' }"
        type="button"
        class="px-4 py-2 text-sm font-medium border-t border-b border-gray-200 dark:border-gray-600 focus:z-10 focus:ring-2 focus:ring-gimysite-500 focus:border-gimysite-500"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.5"
            class="w-5 h-5"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
            />
        </svg>
        <span class="sr-only">Light Theme</span>
    </button>
    <button
        @click="theme = 'dark'"
        :class="{ 'bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100': theme === 'dark', 'text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-600': theme !== 'dark' }"
        type="button"
        class="px-4 py-2 text-sm font-medium border border-gray-200 dark:border-gray-600 rounded-r-md focus:z-10 focus:ring-2 focus:ring-gimysite-500 focus:border-gimysite-500"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.5"
            class="w-5 h-5"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
            />
        </svg>
        <span class="sr-only">Dark Theme</span>
    </button>
</div>