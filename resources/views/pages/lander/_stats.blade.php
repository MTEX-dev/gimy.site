
<section class="bg-gimysite-50 py-16 sm:py-24 dark:bg-gimysite-900">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center">
            <h2
                class="text-base font-semibold leading-7 text-gimysite-600 dark:text-gimysite-400"
            >
                {{ __('pages.lander.stats.subheadline') }}
            </h2>
            <p
                class="mt-2 text-3xl font-bold tracking-tight text-gimysite-900 sm:text-4xl dark:text-white"
            >
                {{ __('pages.lander.stats.title') }}
            </p>
        </div>
        <div
            class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-10 text-center sm:gap-y-12 lg:mx-0 lg:max-w-none lg:grid-cols-4"
        >
            <div
                class="flex flex-col items-center justify-center rounded-lg bg-white px-8 py-10 shadow-lg dark:bg-gimysite-800"
            >
                <p
                    class="text-5xl font-bold tracking-tight text-gimysite-700 dark:text-gimysite-200"
                >
                    {{ __('pages.lander.stats.sites.data') }}
                </p>
                <p
                    class="mt-4 text-lg font-medium leading-6 text-gimysite-600 dark:text-gimysite-300"
                >
                    {{ __('pages.lander.stats.sites.title') }}
                </p>
            </div>
            <div
                class="flex flex-col items-center justify-center rounded-lg bg-white px-8 py-10 shadow-lg dark:bg-gimysite-800"
            >
                <p
                    class="text-5xl font-bold tracking-tight text-gimysite-700 dark:text-gimysite-200"
                >
                    {{ __('pages.lander.stats.free_sites.data') }}
                </p>
                <p
                    class="mt-4 text-lg font-medium leading-6 text-gimysite-600 dark:text-gimysite-300"
                >
                    {{ __('pages.lander.stats.free_sites.title') }}
                </p>
            </div>
            <div
                class="flex flex-col items-center justify-center rounded-lg bg-white px-8 py-10 shadow-lg dark:bg-gimysite-800"
            >
                <p
                    class="text-5xl font-bold tracking-tight text-gimysite-700 dark:text-gimysite-200"
                >
                    {{ __('pages.lander.stats.instant_online.data') }}
                </p>
                <p
                    class="mt-4 text-lg font-medium leading-6 text-gimysite-600 dark:text-gimysite-300"
                >
                    {{ __('pages.lander.stats.instant_online.title') }}
                </p>
            </div>
            <div
                class="flex flex-col items-center justify-center rounded-lg bg-white px-8 py-10 shadow-lg dark:bg-gimysite-800"
            >
                <p
                    class="text-5xl font-bold tracking-tight text-gimysite-700 dark:text-gimysite-200"
                >
                    {{ __('pages.lander.stats.uptime.data') }}
                </p>
                <p
                    class="mt-4 text-lg font-medium leading-6 text-gimysite-600 dark:text-gimysite-300"
                >
                    {{ __('pages.lander.stats.uptime.title') }}
                </p>
            </div>
        </div>
    </div>
</section>