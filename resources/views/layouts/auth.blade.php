@extends('layouts.app')

@php
    $hideNavbar = true;
    $hideFooter = true;
@endphp

@section('content')
    <div class="flex flex-col sm:justify-center items-center py-6 bg-gray-100 dark:bg-gray-900 min-h-screen relative">
        <div class="absolute top-4 left-4">
            <a href="{{ route('pages.lander') }}"
                class="inline-flex items-center px-4 py-2 bg-transparent text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition ease-in-out duration-150 focus:outline-none text-sm font-medium rounded-md opacity-70 hover:opacity-100">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                {{ __('auth.back-home') }}
            </a>
        </div>

        <div class="absolute top-4 right-4 flex items-center space-x-2">
            @include('components.locale-switcher')
            @include('components.theme-toggle')
        </div>

        <div class="mt-8 mb-4">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div
            class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            @yield('auth-content')
        </div>
    </div>
@endsection