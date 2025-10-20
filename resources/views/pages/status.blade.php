@extends('layouts.app', ['hideFooter' => true])
@section('title', __('System Status') . ' - ' . config('app.name'))

@section('content')
    <div class="container mx-auto max-w-6xl px-4 py-8 lg:py-16">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Database Status</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ $dbStatus }}
                    </p>
                </div>
            </div>

            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Storage Status ({{ $storageStatus['disk'] }})</h3>
                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div class="px-4 py-5 bg-gray-50 dark:bg-gray-700 shadow rounded-lg overflow-hidden sm:p-6">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                Total Files
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ $storageStatus['total_files'] }}
                            </dd>
                        </div>

                        <div class="px-4 py-5 bg-gray-50 dark:bg-gray-700 shadow rounded-lg overflow-hidden sm:p-6">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                Total Size
                            </dt>
                            <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ $storageStatus['total_size'] }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Model Counts</h3>
                    <dl class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 shadow rounded-lg">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Organisations</dt>
                            <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $models['organisation'] }}</dd>
                        </div>
                        
                        <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 shadow rounded-lg">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Sites</dt>
                            <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $models['site'] }}</dd>
                        </div>

                        <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 shadow rounded-lg">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Site Backups</dt>
                            <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $models['site_backup'] }}</dd>
                        </div>

                        <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 shadow rounded-lg">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Site Visits</dt>
                            <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $models['site_visit'] }}</dd>
                        </div>

                        <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 shadow rounded-lg">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Users</dt>
                            <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $models['user'] }}</dd>
                        </div>

                        <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 shadow rounded-lg">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Sessions</dt>
                            <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $models['session'] }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection