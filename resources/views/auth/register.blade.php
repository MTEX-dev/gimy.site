@extends('layouts.auth')

@section('auth-content')
    <div class="grid grid-cols-1 gap-3 mb-6">
        <a href="{{ route('auth.provider.redirect', 'google') }}"
            class="inline-flex items-center justify-center px-4 py-2 bg-white hover:bg-gray-50 dark:bg-white dark:hover:bg-gray-50 border border-gray-300 rounded-md font-semibold text-sm text-gray-700 tracking-wide transition ease-in-out duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
            <svg class="w-5 h-5 me-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                    fill="#4285F4" />
                <path
                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                    fill="#34A853" />
                <path
                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                    fill="#FBBC05" />
                <path
                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                    fill="#EA4335" />
            </svg>
            {{ __('auth.oauth_signup', ['provider' => 'Google']) }}
        </a>

        <a href="{{ route('auth.provider.redirect', 'github') }}"
            class="inline-flex items-center justify-center px-4 py-2 bg-[#24292e] hover:bg-[#1b1f23] dark:bg-[#24292e] dark:hover:bg-[#1b1f23] border border-transparent rounded-md font-semibold text-sm text-white tracking-wide transition ease-in-out duration-150 focus:outline-none focus:ring-2 focus:ring-[#24292e] focus:ring-offset-2 dark:focus:ring-offset-gray-800">
            <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z" />
            </svg>
            {{ __('auth.oauth_signup', ['provider' => 'GitHub']) }}
        </a>
    </div>

    <div class="flex items-center justify-center mb-6">
        <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
        <span class="px-2 text-gray-500 dark:text-gray-400">{{ __('strings.or') }}</span>
        <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('auth.name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('auth.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('auth.password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!--div class="mt-4">
            <label for="terms" class="inline-flex items-center">
                <input id="terms" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-gimysite-600 shadow-sm focus:ring-gimysite-500 dark:focus:ring-gimysite-600 dark:focus:ring-offset-gray-800"
                    name="terms" required>
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('auth.terms_accepted') }}
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('pages.legal', 'terms') }}">
                        {{ __('auth.terms_accepted_link') }}
                    </a>
                    {{ __('strings.and') }}
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('pages.legal', 'privacy') }}">
                        {{ __('auth.privacy_accepted_link') }}
                    </a>
                </span>
            </label>
        </div-->

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('auth.already_registered') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('auth.register') }}
            </x-primary-button>
        </div>

        <div class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">
            {{ __('auth.signup_terms_disclaimer') }}
        </div>
    </form>
@endsection