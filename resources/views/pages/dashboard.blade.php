@extends('layouts.app')

@section('title', __('Dashboard'))

@section('header')
    <h2 class="font-semibold text-xl text-gimysite-800 dark:text-gimysite-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gimysite-100 dark:bg-gimysite-900 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gimysite-900 dark:text-gimysite-100">
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-center text-lg">
                            {{ __('pages.dashboard.welcome_message', ['name' => Auth::user()->name]) }}
                        </p>
                        <p class="mt-4 text-gimysite-700 dark:text-gimysite-300">
                            {{ __('pages.dashboard.welcome_subtitle') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection