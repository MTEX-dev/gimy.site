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

                    @if ($organisations && $organisations->count() > 0)
                        <div class="mt-8">
                            <h3 class="text-xl font-semibold mb-4">
                                {{ __('Your Organisations') }}
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
                                                    {{ $organisation->sites->count() }}
                                                    {{ trans_choice('Site|Sites', $organisation->sites->count()) }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="mt-8 text-center">
                            <p class="text-gimysite-700 dark:text-gimysite-300">
                                {{ __('You don\'t have any organisations yet.') }}
                            </p>
                            <a href="#"
                                class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gimysite-600 hover:bg-gimysite-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500">
                                {{ __('Create New Organisation') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <button popovertarget="create-organization-popover" class="px-4 py-2 bg-gimysite-600 text-white rounded-md">
              {{ __('panel.create_name_item', ['item' => __('panel.organisations.item_name')]) }}
            </button>
            
            @include('components.panel.create-organisation-popover')
        </div>
    </div>
@endsection