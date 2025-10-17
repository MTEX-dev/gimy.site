@props(['title', 'value', 'icon', 'color' => 'brand'])

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl transition-all duration-300 hover:shadow-md hover:scale-[1.02]">
    <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center space-x-4">
        <div class="shrink-0 bg-{{ $color }}-100 dark:bg-{{ $color }}-900/40 p-3 rounded-2xl flex items-center justify-center">
            {!! $icon !!}
        </div>
        <div>
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">{{ $title }}</h3>
            <p class="text-3xl font-bold mt-1">{{ $value }}</p>
        </div>
    </div>
</div>