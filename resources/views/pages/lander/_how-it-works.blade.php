<section class="py-20 bg-white dark:bg-gray-900">
    <div class="max-w-5xl mx-auto px-6">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
            {{ __('pages.lander.how_it_works.title') }}
        </h2>

        <div class="space-y-12">
            @foreach(range(1, 4) as $i)
            <div class="flex gap-6 items-start">
                <div class="flex-shrink-0 w-16 h-16 bg-brand-600 dark:bg-brand-700 text-white rounded-full flex items-center justify-center text-2xl font-bold">
                    {{ $i }}
                </div>
                <div class="flex-1 pt-2">
                    <h3 class="text-2xl font-bold mb-2">
                        {{ __("pages.lander.how_it_works.steps.{$i}.title") }}
                    </h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                        {{ __("pages.lander.how_it_works.steps.{$i}.description") }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>