<section class="relative flex h-screen items-center justify-center overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-gimysite-600 via-gimysite-700 to-gimysite-900 dark:from-gimysite-900 dark:via-gimysite-950 dark:to-black"></div>
    
    <!-- Animated Gradient Orbs -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-1/2 -left-1/2 w-full h-full bg-gimysite-400/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 4s;"></div>
        <div class="absolute -bottom-1/2 -right-1/2 w-full h-full bg-gimysite-300/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 6s; animation-delay: 1s;"></div>
    </div>

    <!-- Animated Grid Pattern -->
    <div class="absolute inset-0 opacity-20">
        <svg class="h-full w-full text-white dark:text-gimysite-100" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="hero-grid" width="60" height="60" patternUnits="userSpaceOnUse">
                    <path d="M 60 0 L 0 0 0 60" fill="none" stroke="currentColor" stroke-width="0.5" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#hero-grid)" />
        </svg>
    </div>

    <!-- Floating Code Snippets Animation -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-10">
        <div class="absolute top-1/4 left-1/4 text-gimysite-200 text-xs font-mono animate-float">&lt;/&gt;</div>
        <div class="absolute top-1/3 right-1/4 text-gimysite-200 text-xs font-mono animate-float" style="animation-delay: 1s;">{ }</div>
        <div class="absolute bottom-1/3 left-1/3 text-gimysite-200 text-xs font-mono animate-float" style="animation-delay: 2s;">CSS</div>
        <div class="absolute bottom-1/4 right-1/3 text-gimysite-200 text-xs font-mono animate-float" style="animation-delay: 3s;">JS</div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 mx-auto max-w-5xl px-6 text-center text-white">
        <!-- mtex.dev Badge -->
        <div class="mb-6 inline-flex items-center gap-2 rounded-full bg-white/10 backdrop-blur-sm px-4 py-2 text-sm font-medium text-gimysite-100 ring-1 ring-white/20">
            <span class="flex h-2 w-2 rounded-full bg-gimysite-400 animate-pulse"></span>
            <span>Powered by mtex.dev</span>
        </div>

        <h1 class="mb-6 text-4xl font-bold leading-tight md:text-6xl lg:text-7xl bg-clip-text text-transparent bg-gradient-to-r from-white via-gimysite-100 to-gimysite-200 animate-gradient">
            The Developer's Sandbox<br/>for Web Creation
        </h1>
        
        <p class="mb-8 text-xl md:text-1xl text-gimysite-100 max-w-2xl mx-auto leading-relaxed">
            Gimy.site is a rapid-deployment platform from <span class="font-semibold text-white">mtex.dev</span>. 
            Write HTML, CSS, and JS for multiple pages and publish your static sites instantly.
        </p>
        
        <!-- CTA Input -->
        <!--form class="mx-auto max-w-2xl" x-data="{ username: '' }">
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-gimysite-400 to-gimysite-600 rounded-full blur opacity-25 group-hover:opacity-40 transition duration-1000"></div>
                <div class="relative flex flex-col items-stretch overflow-hidden rounded-full bg-white/95 backdrop-blur-lg shadow-2xl ring-1 ring-gimysite-200/50 sm:flex-row">
                    <div class="relative flex flex-1 items-center">
                        <input
                            type="text"
                            x-model="username"
                            placeholder="{{ __('pages.lander.hero.placeholder') }}"
                            class="peer w-full border-0 bg-transparent py-5 pl-6 pr-2 text-gray-900 placeholder-gray-400 outline-none focus:ring-0 dark:text-gray-100 dark:placeholder-gray-500 text-lg"
                        />
                        <span class="pr-2 font-semibold text-gimysite-600 dark:text-gimysite-400">.gimy.site</span>
                    </div>                    
                    
                    <button
                        type="submit"
                        class="whitespace-nowrap bg-gradient-to-r from-gimysite-500 to-gimysite-600 px-8 py-5 font-bold text-white transition-all duration-300 hover:from-gimysite-600 hover:to-gimysite-700 hover:shadow-lg hover:scale-105 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-gimysite-400 sm:rounded-full"
                    >
                        {{ __('pages.lander.hero.cta') }}
                    </button>
                </div>
            </div>
            
            <p class="mt-4 text-sm text-gimysite-100/80">
                {{ __('pages.lander.hero.validation_message') }}
            </p>
        </form-->
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.1; }
            50% { transform: translateY(-20px) rotate(5deg); opacity: 0.2; }
        }
        @keyframes gradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-gradient { background-size: 200% auto; animation: gradient 8s linear infinite; }
    </style>
</section>