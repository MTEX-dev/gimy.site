<nav
  x-data="{ open: false }"
  class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700"
>
  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex items-center">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
          <a href="{{ route('dashboard') }}">
            <x-application-logo
              class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
            />
          </a>
        </div>

        <!-- Breadcrumb Navigation -->
        <div class="ml-4 flex items-center space-x-2">
          @if (isset($organisation))
          <!-- Organization Level Breadcrumb -->
          <div
            x-data="{ open: false }"
            class="relative flex items-center"
          >
            <button
              @click="open = !open"
              class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
            >
              <span
                class="relative inline-grid shrink-0 align-middle *:col-start-1 *:row-start-1 bg-[#fff1f4] text-[#e44e67] rounded-sm *:rounded-sm"
              >
                <svg
                  class="fill-current text-[48px] font-medium uppercase select-none w-5 h-5"
                  viewBox="0 0 100 100"
                  aria-hidden="true"
                >
                  <text
                    x="50%"
                    y="50%"
                    alignment-baseline="middle"
                    dominant-baseline="middle"
                    text-anchor="middle"
                    dy=".125em"
                    fill="currentColor"
                  >
                    {{ substr($organisation->name, 0, 1) }}
                  </text>
                </svg>
                <span
                  class="relative border forced-colors:outline border-[#ffd8db]"
                  aria-hidden="true"
                ></span>
              </span>
              <span>{{ $organisation->name }}</span>
              <svg
                class="ml-1 -mr-0.5 h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>

            <div
              x-show="open"
              @click.away="open = false"
              x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="transform opacity-0 scale-95"
              x-transition:enter-end="transform opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="transform opacity-100 scale-100"
              x-transition:leave-end="transform opacity-0 scale-95"
              class="absolute z-50 mt-2 top-full left-0 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none"
            >
              <div class="py-1">
                <a
                  href="{{ route('panel.overview', ['organisation' => $organisation]) }}"
                  class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
                  >Current Organization</a
                >
                <div class="border-t border-gray-100 dark:border-gray-600"></div>
                <!-- Example other organizations -->
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
                  >Other Org 1</a
                >
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
                  >Other Org 2</a
                >
                <div class="border-t border-gray-100 dark:border-gray-600"></div>
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-indigo-600 dark:text-indigo-400 hover:bg-gray-100 dark:hover:bg-gray-600"
                  >+ Create New Organization</a
                >
              </div>
            </div>
          </div>

          @if (isset($site))
          <span class="text-gray-400 dark:text-gray-600">/</span>
          <!-- Site Level Breadcrumb -->
          <div
            x-data="{ open: false }"
            class="relative flex items-center"
          >
            <button
              @click="open = !open"
              class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
            >
              <span
                class="relative inline-grid shrink-0 align-middle *:col-start-1 *:row-start-1 bg-[#fff1f4] text-[#e44e67] rounded-sm *:rounded-sm"
              >
                <svg
                  class="fill-current text-[48px] font-medium uppercase select-none w-5 h-5"
                  viewBox="0 0 100 100"
                  aria-hidden="true"
                >
                  <text
                    x="50%"
                    y="50%"
                    alignment-baseline="middle"
                    dominant-baseline="middle"
                    text-anchor="middle"
                    dy=".125em"
                    fill="currentColor"
                  >
                    {{ substr($site->name, 0, 1) }}
                  </text>
                </svg>
                <span
                  class="relative border forced-colors:outline border-[#ffd8db]"
                  aria-hidden="true"
                ></span>
              </span>
              <span>{{ $site->name }}</span>
              <svg
                class="ml-1 -mr-0.5 h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>

            <div
              x-show="open"
              @click.away="open = false"
              x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="transform opacity-0 scale-95"
              x-transition:enter-end="transform opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="transform opacity-100 scale-100"
              x-transition:leave-end="transform opacity-0 scale-95"
              class="absolute z-50 mt-2 top-full left-0 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none"
            >
              <div class="py-1">
                <a
                  href="{{ route('panel.site.overview', ['organisation' => $organisation, 'site' => $site]) }}"
                  class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
                  >Current Site</a
                >
                <div class="border-t border-gray-100 dark:border-gray-600"></div>
                <!-- Example other sites -->
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
                  >Other Site 1</a
                >
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
                  >Other Site 2</a
                >
                <div class="border-t border-gray-100 dark:border-gray-600"></div>
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-indigo-600 dark:text-indigo-400 hover:bg-gray-100 dark:hover:bg-gray-600"
                  >+ Create New Site</a
                >
              </div>
            </div>
          </div>
          @endif @endif
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
          <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
          </x-nav-link>
        </div>
      </div>

      <div class="flex items-center ml-auto">
        <x-locale-switcher />
        <x-theme-toggle />

        <!-- Search Button -->
        <div class="sm:flex sm:items-center sm:ml-6">
          <button
            @click="$dispatch('toggle-search-modal')"
            class="flex items-center p-2 bg-gray-100 dark:bg-gray-700 rounded-md text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white"
          >
            <svg
              class="w-5 h-5"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
              ></path>
            </svg>
            <span class="ml-2">Search...</span>
            <kbd class="ml-2 text-xs border rounded px-1.5 py-0.5"
              >⌘K</kbd
            >
          </button>
        </div>

        <!-- Settings Dropdown - Moved to be consistent with previous structure (if it was there) or can be placed elsewhere -->
        <div class="hidden sm:flex sm:items-center sm:ml-6">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
              >
                <div>{{ Auth::user()->name }}</div>

                <div class="ml-1">
                  <svg
                    class="fill-current h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </div>
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link :href="route('settings.profile')">
                {{ __('Profile') }}
              </x-dropdown-link>

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link
                  :href="route('logout')"
                  onclick="event.preventDefault();
                                                this.closest('form').submit();"
                >
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
        </div>
      </div>
    </div>
  </div>
</nav>