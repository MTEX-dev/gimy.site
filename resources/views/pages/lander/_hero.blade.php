<section class="relative flex h-screen items-center justify-center overflow-hidden">
    <div
        class="absolute inset-0 bg-gradient-to-br from-gimysite-700 via-gimysite-900 to-black"
    ></div>

    <div
        class="absolute inset-0 bg-[url('/img/grid.svg')] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))]"
    ></div>

    <div
        class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,rgba(168,85,247,0.25),rgba(255,255,255,0))]"
    ></div>

    <div
        class="absolute inset-0 h-full w-full animate-pulse-slow overflow-hidden rounded-md"
    >
        <div
            class="absolute inset-0 h-full w-full bg-[radial-gradient(#888_1px,transparent_1px)] [background-size:16px_16px] [mask-image:radial-gradient(ellipse_50%_50%_at_50%_50%,#000_70%,transparent_100%)]"
        ></div>
    </div>

    <div class="pointer-events-none absolute inset-0 overflow-hidden">
        <div
            class="absolute bottom-0 left-0 top-0 w-1/2 bg-gradient-to-r from-black via-gimysite-950/50 to-transparent"
        ></div>
        <div
            class="absolute bottom-0 right-0 top-0 w-1/2 bg-gradient-to-l from-black via-gimysite-950/50 to-transparent"
        ></div>
    </div>

    <div class="absolute inset-0 overflow-hidden opacity-50">
        <svg
            class="absolute left-1/4 top-1/4 h-auto w-12 text-gimysite-400 animate-drift-and-rotate"
            style="animation-delay: 0s"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z"
            />
        </svg>

        <svg
            class="absolute right-1/4 top-1/3 h-auto w-12 text-gimysite-400 animate-drift-and-rotate"
            style="animation-delay: 2s; animation-duration: 10s"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75"
            />
        </svg>

        <svg
            class="absolute bottom-1/3 left-1/3 h-auto w-12 text-gimysite-400 animate-drift-and-rotate"
            style="animation-delay: 4s; animation-duration: 12s"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M14.25 9.75L16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z"
            />
        </svg>
    </div>

    <div class="relative z-10 mx-auto max-w-5xl px-6 text-center">
        <div
            class="mb-6 inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-gimysite-100 ring-1 ring-white/20 backdrop-blur-sm"
        >
            <span
                class="flex h-2 w-2 rounded-full bg-gimysite-400 animate-pulse"
            ></span>
            <span>Powered by mtex.dev</span>
        </div>

        <h1
            class="mb-6 bg-gradient-to-r from-white via-gimysite-100 to-gimysite-200 bg-clip-text text-4xl font-bold leading-tight text-transparent drop-shadow-lg md:text-6xl lg:text-7xl animate-gradient"
        >
            The Developer's Sandbox<br />for Web Creation
        </h1>

        <p
            class="mx-auto mb-8 max-w-2xl text-lg leading-relaxed text-gimysite-100/80 md:text-xl"
        >
            Gimy.site is a rapid-deployment platform from
            <span class="font-semibold text-white">mtex.dev</span>. Write
            HTML, CSS, and JS for multiple pages and publish your static sites
            instantly.
        </p>

        <form class="mx-auto max-w-2xl" x-data="{ username: '' }">
            <div class="relative group">
                <div
                    class="absolute -inset-1 rounded-full bg-gradient-to-r from-gimysite-400 to-gimysite-600 blur opacity-25 transition duration-1000 group-hover:opacity-40"
                ></div>
                <div
                    class="relative flex flex-col items-stretch overflow-hidden rounded-full bg-white/5 backdrop-blur-lg shadow-2xl ring-1 ring-gimysite-200/20 sm:flex-row"
                >
                    <div class="relative flex flex-1 items-center">
                        <input
                            type="text"
                            x-model="username"
                            placeholder="{{ __('pages.lander.hero.placeholder') }}"
                            class="peer w-full border-0 bg-transparent py-5 pl-6 pr-2 text-lg text-white placeholder-gray-400 outline-none focus:ring-0"
                        />
                        <span
                            class="pr-2 font-semibold text-gimysite-400"
                        >.gimy.site</span
                        >
                    </div>

                    <button
                        type="submit"
                        class="whitespace-nowrap bg-gradient-to-r from-gimysite-500 to-gimysite-600 px-8 py-5 font-bold text-white transition-all duration-300 hover:scale-105 hover:from-gimysite-600 hover:to-gimysite-700 hover:shadow-lg focus-visible:ring-2 focus-visible:ring-gimysite-400 focus-visible:ring-offset-2 sm:rounded-full"
                    >
                        {{ __('pages.lander.hero.cta') }}
                    </button>
                </div>
            </div>

            <p class="mt-4 text-sm text-gimysite-100/60">
                {{ __('pages.lander.hero.validation_message') }}
            </p>
        </form>
    </div>

    <style>
        @keyframes drift-and-rotate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
            25% {
                opacity: 0.7;
            }
            50% {
                transform: translateY(-40px) rotate(10deg);
            }
            75% {
                opacity: 0.7;
            }
            100% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
        }
        @keyframes gradient {
            0%,
            100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }
        .animate-drift-and-rotate {
            animation: drift-and-rotate 8s ease-in-out infinite;
        }
        .animate-gradient {
            background-size: 200% auto;
            animation: gradient 8s linear infinite;
        }
        .animate-pulse-slow {
            animation: pulse 8s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</section>