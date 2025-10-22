@auth
    <div class="ms-3 relative ml-2">
        <div x-data="{ open: false }" @click.away="open = false" class="relative">
            <div @click="open = !open">
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm
                           leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400
                           hover:text-gray-700 dark:hover:text-gray-300
                           focus:outline-none transition ease-in-out duration-150">
                    @if (Auth::user()->getDisplayableAvatar())
                        <img class="h-8 w-8 rounded-full object-cover"
                             src="{{ Auth::user()->getDisplayableAvatar() }}"
                             alt="{{ Auth::user()->name }}" />
                    @endif
                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 0 111.414 1.414l-4 4a1 0 01-1.414 0l-4-4a1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </div>

            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right
                        right-0 overflow-visible"
                 style="display: none;">
                <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1
                            bg-white dark:bg-gray-700">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        <div class="flex items-center">
                            @if (Auth::user()->getDisplayableAvatar())
                                <img class="h-8 w-8 rounded-full object-cover me-2"
                                     src="{{ Auth::user()->getDisplayableAvatar() }}"
                                     alt="{{ Auth::user()->name }}" />
                            @endif
                            <div>
                                <div class="font-medium text-sm text-gray-800 dark:text-gray-200">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <a href="{{ route('settings.profile') }}"
                       class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700
                              dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800
                              focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800
                              transition duration-150 ease-in-out">
                        {{ __('settings.nav.profile') }}
                    </a>

                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div x-data="{ localeOpen: false }" @click.away="localeOpen = false"
                         class="relative">
                        <a href="#" @click="localeOpen = ! localeOpen"
                           class="block w-full px-4 py-2 text-start text-sm leading-5
                                  text-gray-700 dark:text-gray-300 hover:bg-gray-100
                                  dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100
                                  dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                            <div class="flex items-center">
                                <img src="{{ asset('img/locales/' . app()->getLocale() . '.png') }}"
                                     alt="{{ strtoupper(app()->getLocale()) }}"
                                     class="h-4 w-6 me-2">
                                {{ __('settings.locale.title') }}
                                <svg class="fill-current h-4 w-4 ms-auto" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 0 011.414 0L10 10.586l3.293-3.293a1 0 111.414 1.414l-4 4a1 0 01-1.414 0l-4-4a1 0 010-1.414z"
                                          clip-rule="evenodd" />
                                </svg>
                            </div>
                        </a>

                        <div x-show="localeOpen" x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute z-50 top-0 right-full mr-1 w-28 rounded-md
                                    shadow-lg origin-top-left bg-white dark:bg-gray-700
                                    ring-1 ring-black ring-opacity-5 focus:outline-none"
                             style="display: none;">
                            <div class="py-1">
                                @foreach (config('app.locales') as $locale => $name)
                                    <a href="{{ route('locale.set', $locale) }}"
                                       class="flex items-center px-4 py-2 text-sm leading-5
                                              @if(app()->getLocale() === $locale) text-gimysite-600
                                              dark:text-gimysite-400 font-semibold @else
                                              text-gray-700 dark:text-gray-200 @endif
                                              hover:bg-gray-100 dark:hover:bg-gray-600
                                              focus:outline-none focus:bg-gray-100
                                              dark:focus:bg-gray-600 transition duration-150 ease-in-out">
                                        <img src="{{ asset('img/locales/' . $locale . '.png') }}"
                                             alt="{{ $name }}" class="h-4 w-6 me-2">
                                        <span>{{ $name }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="block w-full px-4 py-2 text-start text-sm leading-5 text-red-500
                                  hover:text-red-700 dark:hover:text-red-300 hover:bg-red-100
                                  dark:hover:bg-red-800 focus:outline-none focus:bg-red-100
                                  dark:focus:bg-red-800 transition duration-150 ease-in-out">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                {{ __('auth.log_out') }}
                            </div>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endauth