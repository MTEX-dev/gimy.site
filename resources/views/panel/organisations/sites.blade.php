@extends('layouts.panel')

@section('header')
    <h2 class="font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ $organisation->name . ' ' . __('panel.sites.sites_title') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 flex items-center space-x-4">
                        <img src="{{ $organisation->getDisplayableAvatar() }}" alt="{{ $organisation->name }}"
                            class="h-16 w-16 rounded-full object-cover">
                        <div>
                            <h3 class="text-2xl font-bold">{{ $organisation->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $organisation->email }}</p>
                        </div>
                    </div>

                    <div class="mb-4 flex items-center justify-between">
                        <h4 class="text-xl font-semibold">{{ __('panel.sites.sites_title') }}</h4>
                        @can('addSite', $organisation)
                            <a href="{{ route('panel.organisations.sites.create', $organisation) }}"
                                class="inline-flex items-center rounded-md border border-transparent bg-gimysite-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gimysite-700 focus:outline-none focus:ring-2 focus:ring-gimysite-500 focus:ring-offset-2">
                                {{ __('panel.sites.create_new_button') }}
                            </a>
                        @endcan
                    </div>

                    @if ($organisation->sites->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">{{ __('panel.sites.no_sites_message') }}</p>
                    @else
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($organisation->sites as $site)
                                <div class="rounded-lg bg-gray-50 p-4 shadow dark:bg-gray-700">
                                    <h5 class="text-lg font-bold">{{ $site->name }}</h5>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $site->custom_domain ?? $site->slug }}
                                    </p>
                                    <a href="{{ route('panel.sites.overview', ['organisation' => $organisation, 'site' => $site]) }}"
                                        class="mt-2 inline-block text-gimysite-600 hover:text-gimysite-900 dark:text-gimysite-400 dark:hover:text-gimysite-200">{{ __('panel.sites.view_details_button') }}</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection