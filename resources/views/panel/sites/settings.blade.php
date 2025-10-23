@extends('layouts.panel')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('panel.sites.settings.title') }}: {{ $site->name }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-4">
                        {{ __('panel.sites.settings.update_info_title') }}
                    </h3>
                    <form
                        action="{{ route('panel.sites.update', ['site' => $site, 'organisation' => $organisation]) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label
                                for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                            >{{ __('panel.sites.name') }}</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $site->name) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gimysite-300 focus:ring focus:ring-gimysite-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                            >
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label
                                for="custom_domain"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                            >{{ __('panel.sites.custom_domain_optional') }}</label>
                            <input
                                type="text"
                                name="custom_domain"
                                id="custom_domain"
                                value="{{ old('custom_domain', $site->custom_domain) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gimysite-300 focus:ring focus:ring-gimysite-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                            >
                            @error('custom_domain')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gimysite-600 hover:bg-gimysite-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500"
                        >
                            {{ __('settings.profile.update_button') }}
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-4">
                        {{ __('panel.sites.settings.delete_title') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        {{ __('panel.sites.settings.delete_warning_message') }}
                        (`{{ $site->slug }}`)
                        {{ __('strings.and') }}
                        {{ __('auth.password') }}.
                    </p>
                    <button
                        popovertarget="delete-site-popover"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    >
                        {{ __('panel.sites.settings.delete_button') }}
                    </button>

                    <div
                        popover
                        id="delete-site-popover"
                        class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow-lg"
                    >
                        <form
                            action="{{ route('panel.sites.destroy', ['site' => $site, 'organisation' => $organisation]) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')
                            <h4 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-100">
                                {{ __('panel.sites.settings.delete_confirm_title') }}
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                {{ __('panel.sites.settings.delete_popover_message') }}
                                `{{ $site->slug }}`
                            </p>
                            <div class="mb-4">
                                <label
                                    for="slug_confirmation"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                >{{ __('panel.sites.settings.slug_confirmation_label') }}</label>
                                <input
                                    type="text"
                                    name="slug_confirmation"
                                    id="slug_confirmation"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gimysite-300 focus:ring focus:ring-gimysite-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                                >
                                @error('slug_confirmation')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label
                                    for="password"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                >{{ __('auth.password') }}</label>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gimysite-300 focus:ring focus:ring-gimysite-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                                >
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="flex justify-end">
                                <button
                                    type="button"
                                    popovertarget="delete-site-popover"
                                    popovertargetaction="hide"
                                    class="mr-2 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500 dark:bg-gray-600 dark:text-gray-200 dark:border-gray-500 dark:hover:bg-gray-500"
                                >
                                    {{ __('strings.cancel') }}
                                </button>
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                >
                                    {{ __('panel.sites.settings.delete_button') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection