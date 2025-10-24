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
                            <nav class="flex" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                    <li class="inline-flex items-center">
                                        <a href="{{ route('panel.sites.files', [$organisation, $site, 'path' => '/']) }}"
                                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                                </path>
                                            </svg>
                                            {{ __('Home') }}
                                        </a>
                                    </li>
                                    @php
                                        $breadcrumbs = collect(explode('/', $path))->filter();
                                        $currentPath = '';
                                    @endphp
                                    @foreach ($breadcrumbs as $breadcrumb)
                                        @php
                                            $currentPath .= '/' . $breadcrumb;
                                        @endphp
                                        <li>
                                            <div class="flex items-center">
                                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <a href="{{ route('panel.sites.files', [$organisation, $site, 'path' => $currentPath]) }}"
                                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ $breadcrumb }}</a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </nav>
                        </div>
                    </div>
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
                            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'upload-file')">
                                {{ __('Upload File') }}
                            </x-primary-button>

                            <x-modal name="upload-file" :show="$errors->uploadFile->isNotEmpty()" focusable>
                                <form method="post" action="{{ route('panel.sites.files.upload', [$organisation, $site]) }}"
                                    enctype="multipart/form-data" class="p-6">
                                    @csrf

                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Upload File') }}
                                    </h2>

                                    <div class="mt-6">
                                        <x-input-label for="file" value="{{ __('File') }}" />
                                        <input type="file" name="file" id="file"
                                            class="mt-1 block w-full" />
                                        <x-input-error :messages="$errors->uploadFile->get('file')" class="mt-2" />
                                    </div>

                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>

                                        <x-primary-button class="ms-3">
                                            {{ __('Upload') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </x-modal>
                            <x-secondary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-folder')">
                                {{ __('Create Folder') }}
                            </x-secondary-button>

                            <x-modal name="create-folder" :show="$errors->createFolder->isNotEmpty()" focusable>
                                <form method="post"
                                    action="{{ route('panel.sites.files.create-folder', [$organisation, $site]) }}"
                                    class="p-6">
                                    @csrf

                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Create Folder') }}
                                    </h2>

                                    <div class="mt-6">
                                        <x-input-label for="folder_name" value="{{ __('Folder Name') }}" />
                                        <x-text-input id="folder_name" name="folder_name" type="text"
                                            class="mt-1 block w-full" />
                                        <x-input-error :messages="$errors->createFolder->get('folder_name')" class="mt-2" />
                                    </div>

                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>

                                        <x-primary-button class="ms-3">
                                            {{ __('Create') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </x-modal>
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
                                        <x-danger-button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'delete-folder-{{ Str::slug(basename($directory)) }}')">
                                            {{ __('strings.delete') }}
                                        </x-danger-button>

                                        <x-modal name="delete-folder-{{ Str::slug(basename($directory)) }}" focusable>
                                            <form method="post"
                                                action="{{ route('panel.sites.files.delete', [$organisation, $site]) }}"
                                                class="p-6">
                                                @csrf
                                                @method('delete')

                                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Are you sure you want to delete this folder?') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                    {{ __('Once the folder is deleted, all of its resources and data will be permanently deleted.') }}
                                                </p>

                                                <input type="hidden" name="path" value="{{ $path . basename($directory) }}">
                                                <input type="hidden" name="type" value="dir">

                                                <div class="mt-6 flex justify-end">
                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                        {{ __('Cancel') }}
                                                    </x-secondary-button>

                                                    <x-danger-button class="ms-3">
                                                        {{ __('Delete Folder') }}
                                                    </x-danger-button>
                                                </div>
                                            </form>
                                        </x-modal>
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
                                        <x-danger-button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'delete-file-{{ Str::slug(basename($file)) }}')">
                                            {{ __('strings.delete') }}
                                        </x-danger-button>

                                        <x-modal name="delete-file-{{ Str::slug(basename($file)) }}" focusable>
                                            <form method="post"
                                                action="{{ route('panel.sites.files.delete', [$organisation, $site]) }}"
                                                class="p-6">
                                                @csrf
                                                @method('delete')

                                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Are you sure you want to delete this file?') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                    {{ __('Once the file is deleted, all of its resources and data will be permanently deleted.') }}
                                                </p>

                                                <input type="hidden" name="path" value="{{ $path . basename($file) }}">
                                                <input type="hidden" name="type" value="file">

                                                <div class="mt-6 flex justify-end">
                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                        {{ __('Cancel') }}
                                                    </x-secondary-button>

                                                    <x-danger-button class="ms-3">
                                                        {{ __('Delete File') }}
                                                    </x-danger-button>
                                                </div>
                                            </form>
                                        </x-modal>
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