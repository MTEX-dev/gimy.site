<section class="py-20 bg-white dark:bg-gray-900">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
            {{ __('pages.lander.faq.title') }}
        </h2>

        <div class="space-y-4" x-data="{ active: null }">
            @foreach(range(1, 5) as $i)
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <button @click="active = active === {{ $i }} ? null : {{ $i }}" class="w-full px-6 py-4 text-left font-semibold flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <span>{{ __("pages.lander.faq.{$i}.question") }}</span>
                    <svg class="w-5 h-5 transition-transform" :class="active === {{ $i }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === {{ $i }}" x-collapse class="px-6 pb-4 text-gray-600 dark:text-gray-400">
                    {{ __("pages.lander.faq.{$i}.answer") }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>