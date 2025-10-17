<section class="py-16 bg-gimysite-600 dark:bg-gimysite-800 text-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">
            {{ __('pages.lander.stats.title') }}
        </h2>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">
                    {{ number_format($stats['total_users']) }}
                </div>
                <div class="text-lg opacity-90">
                    {{ __('pages.lander.stats.1.description') }}
                </div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">
                    {{ number_format($stats['total_sites']) }}
                </div>
                <div class="text-lg opacity-90">
                    {{ __('pages.lander.stats.2.description') }}
                </div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">
                    {{ number_format($stats['total_site_visits']) }}
                </div>
                <div class="text-lg opacity-90">
                    {{ __('pages.lander.stats.3.description') }}
                </div>
            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold mb-2">
                    {{ number_format($stats['total_site_files']) }}
                </div>
                <div class="text-lg opacity-90">
                    {{ __('pages.lander.stats.4.description') }}
                </div>
            </div>
        </div>
    </div>
</section>