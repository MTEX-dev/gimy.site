<nav class="flex flex-col space-y-2 bg-white dark:bg-gray-800 p-4 rounded-md">
    <a href="{{ route('settings.profile') }}" class="px-4 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
        @if(request()->routeIs('settings.profile'))
            bg-gimysite-600 text-white
        @else
            text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700
        @endif
    ">
        {{ __('settings.nav.profile') }}
    </a>
    <a href="{{ route('settings.password') }}" class="px-4 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
        @if(request()->routeIs('settings.password'))
            bg-gimysite-600 text-white
        @else
            text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700
        @endif
    ">
        {{ __('settings.nav.password') }}
    </a>
    <a href="{{ route('settings.avatar') }}" class="px-4 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
        @if(request()->routeIs('settings.avatar'))
            bg-gimysite-600 text-white
        @else
            text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700
        @endif
    ">
        {{ __('settings.nav.avatar') }}
    </a>
    <a href="{{ route('settings.sessions.index') }}" class="px-4 py-2 rounded-md text-sm font-medium transition-colors duration-150 ease-in-out
        @if(request()->routeIs('settings.sessions.index'))
            bg-gimysite-600 text-white
        @else
            text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700
        @endif
    ">
        {{ __('settings.nav.sessions') }}
    </a>
</nav>