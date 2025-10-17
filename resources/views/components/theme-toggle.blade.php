<div x-data="{
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
        },
        toggleTheme() {
            const themes = ['system', 'light', 'dark'];
            const currentIndex = themes.indexOf(this.theme);
            this.theme = themes[(currentIndex + 1) % themes.length];
        }
    }"
    class="relative inline-flex items-center justify-center ms-4"
>
    <button 
        @click="toggleTheme()" 
        class="w-10 aspect-square flex items-center justify-center 
               rounded-xl cursor-pointer
               text-gray-500 dark:text-gray-400 
               hover:bg-gray-200 dark:hover:bg-gray-700 
               hover:text-gray-700 dark:hover:text-gray-300 
               transition duration-200 ease-in-out"
    >
        <!-- System Icon -->
        <template x-if="theme === 'system'">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 viewBox="0 0 24 24" 
                 fill="none" stroke="currentColor" 
                 stroke-width="1.5" 
                 class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M9.75 17.25v1.25a2 2 0 01-.586 1.414L8.25 21h7.5l-.914-.914A2 2 0 0114.25 18.5v-1.25m5.5-12v11.25a1.75 1.75 0 01-1.75 1.75H6.75A1.75 1.75 0 015 15.25V5.25A1.75 1.75 0 016.75 3.5h10.5a1.75 1.75 0 011.75 1.75z"/>
            </svg>
        </template>

        <!-- Dark Icon -->
        <template x-if="theme === 'dark'">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 viewBox="0 0 24 24" 
                 fill="none" stroke="currentColor" 
                 stroke-width="1.5" 
                 class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
            </svg>
        </template>

        <!-- Light Icon -->
        <template x-if="theme === 'light'">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 viewBox="0 0 24 24" 
                 fill="none" stroke="currentColor" 
                 stroke-width="1.5" 
                 class="w-6 h-6">
                <circle cx="12" cy="12" r="5"/>
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M12 1v2m0 18v2m11-11h-2M3 12H1m16.95 7.05l-1.41-1.41M6.46 6.46L5.05 5.05m12.9 0l-1.41 1.41M6.46 17.54l-1.41 1.41"/>
            </svg>
        </template>
    </button>
</div>
