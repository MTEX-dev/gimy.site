<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                {{ __('pages.lander.pricing.title') }}
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-400">
                {{ __('pages.lander.pricing.subheadline') }}
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div class="bg-white dark:bg-gray-900 p-8 rounded-xl border-2 border-gray-200 dark:border-gray-700">
                <div class="text-sm font-bold text-brand-600 dark:text-brand-400 mb-2">
                    {{ __('pages.lander.pricing.free_plan_headline') }}
                </div>
                <div class="text-4xl font-bold mb-6">Free</div>
                <ul class="space-y-3 mb-8">
                    @foreach(__('pages.lander.pricing.free_plan_features') as $feature)
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-brand-600 dark:text-brand-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                <button class="w-full py-3 border-2 border-brand-600 dark:border-brand-500 text-brand-600 dark:text-brand-400 font-semibold rounded-lg hover:bg-brand-50 dark:hover:bg-brand-900/20 transition-colors">
                    Get Started
                </button>
            </div>

            <div class="bg-brand-600 dark:bg-brand-700 text-white p-8 rounded-xl border-2 border-brand-700 dark:border-brand-600">
                <div class="text-sm font-bold mb-2">
                    {{ __('pages.lander.pricing.pro_plan_headline') }}
                </div>
                <div class="text-4xl font-bold mb-2">$9<span class="text-lg">/month</span></div>
                <div class="text-sm opacity-90 mb-6">
                    {{ __('pages.lander.pricing.pro_plan_description') }}
                </div>
                <ul class="space-y-3 mb-8">
                    @foreach(__('pages.lander.pricing.pro_plan_features') as $feature)
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                <button class="w-full py-3 bg-white text-brand-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                    {{ __('pages.lander.pricing.cta') }}
                </button>
            </div>
        </div>
    </div>
</section>