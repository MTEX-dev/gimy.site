@extends('layouts.app')
@section('title', __('pages.errors.' . $code . '.title') . ' - ' . config('app.name'))
@php
    $hideNavbar = true;
    $hideFooter = true;
@endphp

@section('content')
    <div
        class="relative flex items-center justify-center min-h-screen bg-gradient-to-br from-gimysite-700 to-gimysite-950 dark:from-gray-900 dark:to-black overflow-hidden">
        <div class="absolute top-4 right-4 flex items-center space-x-2 z-20">
            @include('components.locale-switcher')
            @include('components.theme-toggle')
        </div>

        <div class="absolute inset-0 z-0">
            <svg class="absolute bottom-0 left-0 w-full h-auto text-gimysite-800 dark:text-gray-800 opacity-10"
                viewBox="0 0 1440 320">
                <path fill="currentColor" fill-opacity="1"
                    d="M0,160L48,160C96,160,192,160,288,170.7C384,181,480,203,576,192C672,181,768,139,864,138.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
            <svg class="absolute top-0 right-0 w-full h-auto text-gimysite-500 dark:text-gray-700 opacity-10 transform rotate-180"
                viewBox="0 0 1440 320">
                <path fill="currentColor" fill-opacity="1"
                    d="M0,160L48,160C96,160,192,160,288,170.7C384,181,480,203,576,192C672,181,768,139,864,138.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>

        <div class="relative z-10 text-center px-6">
            <p
                class="text-9xl md:text-[18rem] font-extrabold text-gimysite-300 dark:text-gray-600 opacity-20 transform -translate-y-12 select-none">
                {{ $code }}
            </p>
            <p class="text-6xl md:text-8xl font-extrabold text-white dark:text-gray-100 -mt-16 relative z-10">
                {{ $code }}
            </p>
            <h1 class="mt-8 text-5xl md:text-6xl font-extrabold text-white dark:text-gray-50 drop-shadow-lg">
                {{ __('pages.errors.' . $code . '.title') }}
            </h1>
            <p class="mt-6 text-xl md:text-2xl text-gimysite-100 dark:text-gray-300 max-w-2xl mx-auto drop-shadow-md">
                {{ __('pages.errors.' . $code . '.message') }}
            </p>
            <a href="{{ route('pages.lander') }}"
                class="mt-12 inline-flex items-center px-8 py-4 border border-transparent text-lg font-bold rounded-full shadow-lg text-gimysite-900 bg-gimysite-200 hover:bg-gimysite-300 focus:outline-none focus:ring-4 focus:ring-gimysite-500 focus:ring-offset-2 focus:ring-offset-gimysite-700 dark:focus:ring-offset-gray-900 transition ease-in-out duration-300 transform hover:-translate-y-1">
                Go to Homepage
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 -mr-1 h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    </div>
@endsection