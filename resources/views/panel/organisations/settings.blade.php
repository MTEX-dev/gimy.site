@extends('layouts.panel')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $organisation->name }} {{ __('panel.organisations.settings') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-4">
                        {{ __('panel.organisations.update_info_title') }}
                    </h3>
                    <form
                        action="{{ route('panel.organisations.update', $organisation) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label
                                for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                            >{{ __('panel.organisations.name') }}</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $organisation->name) }}"
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
                                for="email"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                            >{{ __('panel.organisations.email_optional') }}</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', $organisation->email) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gimysite-300 focus:ring focus:ring-gimysite-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                            >
                            @error('email')
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
                        {{ __('panel.organisations.delete_title') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        {{ __('panel.organisations.delete_warning_message') }}
                        (`{{ $organisation->slug }}`)
                        {{ __('strings.and') }}
                        {{ __('auth.password') }}.
                    </p>
                    <button
                        popovertarget="delete-organisation-popover"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    >
                        {{ __('panel.organisations.delete_button') }}
                    </button>

                    <div
                        popover
                        id="delete-organisation-popover"
                        class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow-lg"
                    >
                        <form
                            action="{{ route('panel.organisations.destroy', $organisation) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')
                            <h4 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-100">
                                {{ __('panel.organisations.delete_confirm_title') }}
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                {{ __('panel.organisations.delete_popover_message') }}
                                `{{ $organisation->slug }}`
                            </p>
                            <div class="mb-4">
                                <label
                                    for="slug_confirmation"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                >{{ __('panel.organisations.slug_confirmation_label') }}</label>
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
                                    popovertarget="delete-organisation-popover"
                                    popovertargetaction="hide"
                                    class="mr-2 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500 dark:bg-gray-600 dark:text-gray-200 dark:border-gray-500 dark:hover:bg-gray-500"
                                >
                                    {{ __('strings.cancel') }}
                                </button>
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                >
                                    {{ __('panel.organisations.delete_button') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection