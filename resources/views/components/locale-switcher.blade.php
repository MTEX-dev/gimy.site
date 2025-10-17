<div x-data="{ open: false }" @click.away="open = false" class="relative">
    <button @click="open = ! open"
        class="inline-flex items-center px-1 py-1 rounded-md duration-255 hover:bg-gray-100 dark:hover:bg-gray-700 transition
               text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
        <img src="{{ asset('img/locales/' . app()->getLocale() . '.png') }}" alt="{{ strtoupper(app()->getLocale()) }}"
            class="h-5 w-7">
        <svg class="fill-current h-4 w-4 ms-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 mt-2 rounded-md shadow-lg w-32 right-0
               origin-top-right bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none"
        style="display: none;">
        <div class="py-1">
            @foreach (config('app.locales') as $locale => $name)
                <a href="{{ route('locale.set', $locale) }}"
                    class="flex items-center px-4 py-2 text-sm leading-5
                           @if(app()->getLocale() === $locale) text-gimysite-600 dark:text-gimysite-400 font-semibold @else text-gray-700 dark:text-gray-200 @endif
                           hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-600 transition duration-150 ease-in-out">
                    <img src="{{ asset('img/locales/' . $locale . '.png') }}" alt="{{ $name }}"
                        class="h-4 w-6 me-2">
                    <span>{{ $name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>