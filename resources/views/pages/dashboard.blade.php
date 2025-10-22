@extends('layouts.app')

@section('title', __('pages.dashboard.title'))

@section('header')
    <h2 class="font-semibold text-xl text-gimysite-800 dark:text-gimysite-200 leading-tight">
        {{ __('pages.dashboard.title') }}
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

                    @if ($organisations && $organisations->count() > 0)
                        <div class="mt-8">
                            <h3 class="text-xl font-semibold mb-4">
                                {{ __('pages.dashboard.your_organisations') }}
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($organisations as $organisation)
                                    <a href="{{ route('panel.overview', $organisation) }}"
                                        class="block p-4 bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition-shadow">
                                        <div class="flex items-center">
                                            <img class="w-10 h-10 rounded-full mr-4"
                                                src="{{ $organisation->getDisplayableAvatar() }}"
                                                alt="{{ $organisation->name }} Avatar">
                                            <div>
                                                <h4 class="text-lg font-medium">
                                                    {{ $organisation->name }}
                                                </h4>
                                                <p class="text-sm text-gimysite-600 dark:text-gimysite-400">
                                                    {{ trans_choice(
                                                        __('panel.sites.singular') .
                                                            '|' .
                                                            __('panel.sites.plural'),
                                                        $organisation->sites->count(),
                                                    ) }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <button popovertarget="create-organization-popover"
                            class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gimysite-600 hover:bg-gimysite-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500">
                            {{ __('panel.create_name_item', ['item' => __('panel.organisations.item_name')]) }}
                        </button>
                    @else
                        <div class="mt-8 text-center">
                            <p class="text-gimysite-700 dark:text-gimysite-300">
                                {{ __('panel.organisations.no_organisations_yet') }}
                            </p>
                            <button popovertarget="create-organization-popover"
                                class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gimysite-600 hover:bg-gimysite-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500">
                                {{ __('panel.create_name_item', ['item' => __('panel.organisations.item_name')]) }}
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            @include('components.panel.create-organisation-popover')
        </div>
    </div>
@endsection