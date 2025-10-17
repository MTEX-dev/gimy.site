<section
    class="relative flex h-screen items-center justify-center overflow-hidden transition-colors duration-300"
>
    <!-- Background Layer -->
    <div class="absolute inset-0 bg-brand-600 dark:bg-brand-900 transition-colors duration-500"></div>

    <!-- Subtle Grid Pattern -->
    <div class="absolute inset-0 opacity-10">
        <svg class="h-full w-full text-white dark:text-gray-200" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern
                    id="grid"
                    width="40"
                    height="40"
                    patternUnits="userSpaceOnUse"
                >
                    <path
                        d="M 40 0 L 0 0 0 40"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1"
                    />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 mx-auto max-w-4xl px-6 text-center text-white">
        <h1 class="mb-4 text-5xl font-bold md:text-7xl">
            {{ __('pages.lander.hero.title') }}
        </h1>
        <p class="mb-3 text-2xl font-semibold md:text-3xl">
            {{ __('pages.lander.hero.headline') }}
        </p>
        <p class="mb-12 text-lg opacity-90 md:text-xl">
            {{ __('pages.lander.hero.subheadline') }}
        </p>

        <!-- Input Container -->
        <form class="mx-auto max-w-xl" x-data="{ username: '' }">
            <div class="relative flex flex-col items-stretch overflow-hidden rounded-full bg-white/80 backdrop-blur-md shadow-lg ring-1 ring-gray-200 transition-all duration-300 dark:bg-gray-900/70 dark:ring-gray-700 sm:flex-row">
                <div class="relative flex flex-1 items-center">
                    <span class="pl-6 font-medium text-gray-500 dark:text-gray-300">linkmy.name/</span>
                    <input
                        type="text"
                        x-model="username"
                        placeholder="{{ __('pages.lander.hero.placeholder') }}"
                        class="peer w-full border-0 bg-transparent py-4 pl-0 pr-0 text-gray-900 placeholder-gray-400 outline-none focus:ring-0 focus-visible:ring-brand-400 dark:text-gray-100 dark:placeholder-gray-500 dark:focus-visible:ring-brand-600"
                    />
                </div>

                <button
                    type="submit"
                    class="claim-btn whitespace-nowrap bg-brand-500 px-8 py-4 font-semibold text-white transition-colors duration-300 hover:bg-brand-600 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-brand-400 dark:bg-brand-700 dark:hover:bg-brand-600 dark:focus-visible:ring-brand-500 sm:rounded-full"
                >
                    {{ __('pages.lander.hero.cta') }}
                </button>
            </div>

            <p class="mt-3 text-sm text-white/80 dark:text-gray-300 opacity-75">
                {{ __('pages.lander.hero.validation_message') }}
            </p>
        </form>
    </div>
</section>
