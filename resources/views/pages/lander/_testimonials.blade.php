<section class="py-12 bg-white dark:bg-gray-900">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-12">
            {{ __('pages.lander.testimonials.title') }}
        </h2>

        <div class="grid md:grid-cols-2 gap-8">
            @foreach(range(1, 2) as $i)
            <div
                class="bg-gray-50 dark:bg-gray-800 p-6 rounded-xl border
                border-gray-200 dark:border-gray-700"
            >
                <svg
                    class="w-8 h-8 text-brand-600 dark:text-brand-400 mb-3"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"
                    />
                </svg>
                <p class="text-base mb-4 leading-relaxed">
                    {{ __("pages.lander.testimonials.{$i}.quote") }}
                </p>
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-brand-200 dark:bg-brand-800
                        rounded-full"
                    ></div>
                    <div>
                        <div class="font-bold">
                            {{ __("pages.lander.testimonials.{$i}.author") }}
                        </div>
                        <div
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >
                            {{ __("pages.lander.testimonials.{$i}.role") }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>