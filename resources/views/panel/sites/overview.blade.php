@extends('layouts.panel')

@section('header')
    <h2 class="font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('panel.sites.sites_title') . ' ' . __('panel.overview') . ': ' . $site->name }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4 flex items-center justify-between">
                        <h4 class="text-xl font-semibold">{{ __('panel.sites.view_details_button') }}</h4>
                        <a href="#"
                            class="inline-flex items-center rounded-md border border-transparent bg-gimysite-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gimysite-700 focus:outline-none focus:ring-2 focus:ring-gimysite-500 focus:ring-offset-2">
                            {{ __('strings.edit') }}
                        </a>
                    </div>
                    <h3 class="text-2xl font-bold">{{ $site->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ $site->url }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection