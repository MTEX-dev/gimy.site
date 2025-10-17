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
                <div class="flex flex-col items-center justify-center">
                    <p class="text-center">
                        {{ __('pages.dashboard.welcome_message', ['name' => Auth::user()->name]) }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection