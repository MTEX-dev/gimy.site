@extends('layouts.panel')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('panel.sites.files.title') }}: {{ $site->name }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-4">
                        <div>
                            @if ($path !== '/')
                                <a
                                    href="{{ route('panel.sites.files', [$organisation, $site, 'path' => dirname($path)]) }}">
                                    <x-secondary-button>
                                        {{ __('strings.back') }}
                                    </x-secondary-button>
                                </a>
                            @endif
                        </div>
                        <div>
                            <x-primary-button>
                                {{ __('Upload File') }}
                            </x-primary-button>
                            <x-secondary-button class="ml-2">
                                {{ __('Create Folder') }}
                            </x-secondary-button>
                        </div>
                    </div>
                    <table class="w-full">
                        <thead>
                            <tr class="border-b-2 border-gray-200 dark:border-gray-700">
                                <th class="text-left p-2">{{ __('Name') }}</th>
                                <th class="text-left p-2">{{ __('Type') }}</th>
                                <th class="text-left p-2">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($directories as $directory)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="p-2">
                                        <a href="{{ route('panel.sites.files', [$organisation, $site, 'path' => $path . basename($directory) . '/']) }}"
                                            class="text-gimysite-500 hover:underline">
                                            {{ basename($directory) }}
                                        </a>
                                    </td>
                                    <td class="p-2">{{ __('strings.folder') }}</td>
                                    <td class="p-2">
                                        <x-danger-button>
                                            {{ __('strings.delete') }}
                                        </x-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($files as $file)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="p-2">{{ basename($file) }}</td>
                                    <td class="p-2">{{ __('strings.file') }}</td>
                                    <td class="p-2">
                                        <a
                                            href="{{ route('panel.sites.files.edit', [$organisation, $site, 'file' => $path . basename($file)]) }}">
                                            <x-primary-button>
                                                {{ __('strings.edit') }}
                                            </x-primary-button>
                                        </a>
                                        <x-danger-button class="ml-2">
                                            {{ __('strings.delete') }}
                                        </x-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection