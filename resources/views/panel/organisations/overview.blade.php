@extends('layouts.panel')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $organisation->name }} Overview
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center space-x-4 mb-6">
                        @if ($organisation->avatar_path)
                            <img src="{{ Storage::url($organisation->avatar_path) }}" alt="{{ $organisation->name }}"
                                class="w-16 h-16 rounded-full object-cover">
                        @else
                            <div class="w-16 h-16 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-400 text-2xl font-bold">
                                {{ strtoupper(substr($organisation->name, 0, 1)) }}
                            </div>
                        @endif
                        <div>
                            <h3 class="text-2xl font-bold">{{ $organisation->name }}</h3>
                            <p class="text-gray-600 dark:text-gray-400">{{ $organisation->email }}</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-xl font-semibold">Sites</h4>
                        @can('addSite', $organisation)
                            <a href="{{ route('panel.organisations.sites.create', $organisation) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gimysite-600 hover:bg-gimysite-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500">
                                Create New Site
                            </a>
                        @endcan
                    </div>

                    @if ($organisation->sites->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">This organisation has no sites yet.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($organisation->sites as $site)
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow">
                                    <h5 class="text-lg font-bold">{{ $site->name }}</h5>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $site->url }}</p>
                                    <a href="#" class="mt-2 inline-block text-gimysite-600 hover:text-gimysite-900 dark:text-gimysite-400 dark:hover:text-gimysite-200">View Site Details</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection