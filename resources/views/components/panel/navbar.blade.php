<nav
  x-data="{ open: false }"
  class="bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-800 shadow-sm"
>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex items-center">
        <div class="shrink-0 flex items-center">
          <a href="{{ route('dashboard') }}">
            <x-application-logo
              class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
            />
          </a>
        </div>

        <div class="ml-4 flex items-center space-x-2">
          @if (isset($organisation))
          <div x-data="{ open: false }" class="relative flex items-center">
            <button
              type="button"
              @click="open = !open"
              @click.outside="open = false"
              class="flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gimysite-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900"
            >
              <img
                src="{{ $organisation->getDisplayableAvatar() }}"
                alt="{{ $organisation->name }}"
                class="w-5 h-5 rounded-md"
              />
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
              x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 scale-95"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-95"
              class="absolute z-50 mt-2 top-full left-0 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none"
            >
              <div class="py-1">
                @foreach ($organisations as $org)
                <a
                  href="{{ route('panel.overview', ['organisation' => $org]) }}"
                  class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
                >
                  <img
                    src="{{ $org->getDisplayableAvatar() }}"
                    alt="{{ $org->name }}"
                    class="w-5 h-5 rounded-md"
                  />
                  <span>{{ $org->name }}</span>
                  @if ($org->id === $organisation->id)
                  <svg
                    class="ml-auto w-4 h-4 text-gimysite-600 dark:text-gimysite-400"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  @endif
                </a>
                @endforeach

                <div
                  class="border-t border-gray-100 dark:border-gray-600"
                ></div>

                <button
                  popovertarget="create-organization-popover"
                  @click="open = false"
                  type="button"
                  class="block w-full text-left px-4 py-2 text-sm text-gimysite-600 dark:text-gimysite-400 hover:bg-gray-100 dark:hover:bg-gray-600"
                >
                  {{ __('panel.new_name_item', ['item' =>
                  __('panel.organisations.item_name')]) }}
                </button>
                @include('components.panel.create-organisation-popover')
              </div>
            </div>
          </div>

          @if (isset($site) && Route::has('panel.sites.*'))
          <span class="text-gray-400 dark:text-gray-600">/</span>
          <div x-data="{ open: false }" class="relative flex items-center">
            <button
              type="button"
              @click="open = !open"
              @click.outside="open = false"
              class="flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gimysite-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900"
            >
              <img
                src="{{ $site->getDisplayableAvatar() }}"
                alt="{{ $site->name }}"
                class="w-5 h-5 rounded-md"
              />
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
              x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 scale-95"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-95"
              class="absolute z-50 mt-2 top-full left-0 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5 focus:outline-none"
            >
              <div class="py-1">
                @foreach ($organisation->sites as $s)
                <a
                  href="{{ route('panel.sites.overview', ['organisation' => $organisation, 'site' => $s]) }}"
                  class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"
                >
                  <img
                    src="{{ $s->getDisplayableAvatar() }}"
                    alt="{{ $s->name }}"
                    class="w-5 h-5 rounded-md"
                  />
                  <span>{{ $s->name }}</span>
                  @if ($s->id === $site->id)
                  <svg
                    class="ml-auto w-4 h-4 text-gimysite-600 dark:text-gimysite-400"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  @endif
                </a>
                @endforeach
                <div
                  class="border-t border-gray-100 dark:border-gray-600"
                ></div>
                <a
                  href="{{ route('panel.organisations.sites.create', $organisation) }}"
                  class="block px-4 py-2 text-sm text-gimysite-600 dark:text-gimysite-400 hover:bg-gray-100 dark:hover:bg-gray-600"
                >
                  New Site
                </a>
              </div>
            </div>
          </div>
          @endif @endif
        </div>
      </div>

      <div class="flex items-center ml-auto">
        @include('components.theme-toggle')

        <div class="sm:flex sm:items-center sm:ml-6">
          <button
            @click="$dispatch('toggle-search-modal')"
            class="flex items-center p-2 bg-gray-100 dark:bg-gray-700 rounded-full text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 hover:text-gray-800 dark:hover:text-white transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gimysite-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 group"
          >
            <svg
              class="w-5 h-5 group-hover:scale-110 transition-transform duration-200"
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
            <span class="ml-2 hidden sm:inline text-sm"
              >{{ __('strings.search') . '...' }}</span
            >
            <kbd
              class="ml-2 hidden sm:inline-flex text-xs border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 rounded px-1.5 py-0.5 shadow-sm"
              >⌘K</kbd
            >
          </button>
        </div>

        @include('components.panel.user-dropdown')
      </div>
    </div>
  </div>

  @if (isset($organisation))
  <div
    class="bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800"
  >
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-start h-12 space-x-6">
        @if (request()->routeIs('panel.sites.*') && isset($site))
        @include('components.panel.nav-link', [
          'href' => route('panel.sites.overview', ['organisation' => $organisation, 'site' => $site]),
          'active' => request()->routeIs('panel.sites.overview'),
          'text' => __('panel.overview')
        ])
        @include('components.panel.nav-link', [
          'href' => route('panel.sites.files', ['organisation' => $organisation, 'site' => $site]),
          'active' => request()->routeIs('panel.sites.files') || request()->routeIs('panel.sites.files.edit') || request()->routeIs('panel.sites.files.update'),
          'text' => __('panel.sites.files.title')
        ])
        @include('components.panel.nav-link', [
          'href' => route('panel.sites.backups', ['organisation' => $organisation, 'site' => $site]),
          'active' => request()->routeIs('panel.sites.backups'),
          'text' => __('panel.sites.backups.title')
        ])
        @include('components.panel.nav-link', [
          'href' => route('panel.sites.visits', ['organisation' => $organisation, 'site' => $site]),
          'active' => request()->routeIs('panel.sites.visits'),
          'text' => __('panel.sites.visits.title')
        ])
        @include('components.panel.nav-link', [
          'href' => route('panel.sites.settings', ['organisation' => $organisation, 'site' => $site]),
          'active' => request()->routeIs('panel.sites.settings'),
          'text' => __('panel.sites.settings.title')
        ])
        @else
        @include('components.panel.nav-link', [
          'href' => route('panel.overview', ['organisation' => $organisation]),
          'active' => request()->routeIs('panel.overview'),
          'text' => __('panel.overview')
        ])
        @include('components.panel.nav-link', [
          'href' => route('panel.organisations.sites', ['organisation' => $organisation]),
          'active' => request()->routeIs('panel.organisations.sites') || request()->routeIs('panel.organisations.sites.create'),
          'text' => __('panel.sites.plural')
        ])
        @include('components.panel.nav-link', [
          'href' => route('panel.organisations.members', ['organisation' => $organisation]),
          'active' => request()->routeIs('panel.organisations.members'),
          'text' => __('panel.organisations.members.title')
        ])
        @include('components.panel.nav-link', [
          'href' => route('panel.organisations.settings', ['organisation' => $organisation]),
          'active' => request()->routeIs('panel.organisations.settings') || request()->routeIs('panel.organisations.update') || request()->routeIs('panel.organisations.destroy'),
          'text' => __('panel.organisations.settings')
        ])
        @endif
      </div>
    </div>
  </div>
  @endif
</nav>