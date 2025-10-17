@extends('layouts.app')

@section('title', __('Dashboard'))

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('cp.dashboard') }}"
                    class="block w-full h-full p-6 text-gray-900 dark:text-gray-100 group">
                    <div class="flex flex-col items-center justify-center">
                        <h3
                            class="font-semibold text-xl mb-4 group-hover:text-brand-600 dark:group-hover:text-brand-400 transition duration-150 ease-in-out">
                            {{ __('Open Controlpanel') }}
                        </h3>
                        <p class="text-center">
                            {{ __('pages.dashboard.welcome_message', ['name' => Auth::user()->name]) }}
                        </p>
                    </div>
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900 dark:text-gray-100 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Settings:') }}</h3>
                    <ul class="list-disc ml-6">
                        <li>
                            <a href="{{ route('settings.avatar') }}"
                                class="text-brand-600 dark:text-brand-400 hover:text-brand-900 dark:hover:text-brand-600">
                                {{ __('Change Avatar') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings.sessions.index') }}"
                                class="text-brand-600 dark:text-brand-400 hover:text-brand-900 dark:hover:text-brand-600">
                                {{ __('Manage Sessions') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}"
                                class="text-brand-600 dark:text-brand-400 hover:text-brand-900 dark:hover:text-brand-600">
                                {{ __('Edit Profile') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection