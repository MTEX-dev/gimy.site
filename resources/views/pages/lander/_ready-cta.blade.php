<section class="py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="relative isolate overflow-hidden bg-brand-600 dark:bg-brand-800 px-6 py-20 text-center shadow-2xl sm:rounded-3xl sm:px-16">
            <h2 class="mx-auto max-w-2xl text-3xl font-bold tracking-tight text-white sm:text-4xl">
                {{ __('pages.lander.cta_bottom.headline') }}
            </h2>
            <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-white opacity-90">
                {{ __('pages.lander.cta_bottom.subheadline') }}
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <button class="px-8 py-4 bg-white text-brand-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors text-lg">
                    {{ __('pages.lander.cta_bottom.call_to_action') }}
                </button>
            </div>
            <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)]" aria-hidden="true">
                <circle cx="512" cy="512" r="512" fill="url(#radial-gradient-cta-bottom)" fill-opacity="0.7"></circle>
                <defs>
                    <radialGradient id="radial-gradient-cta-bottom">
                        <stop stop-color="var(--color-brand-500)"></stop>
                        <stop offset="1" stop-color="var(--color-brand-700)"></stop>
                    </radialGradient>
                </defs>
            </svg>
        </div>
    </div>
</section>