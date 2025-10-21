@extends('layouts.panel')

@section('header')
    <h2 class="font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('panel.sites.create_for_organisation', ['organisationName' => $organisation->name]) }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('panel.organisations.sites.store', $organisation) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="mb-2 block text-sm font-bold text-gray-700 dark:text-gray-200">{{ __('panel.sites.name') }}</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight shadow focus:outline-none dark:bg-gray-700 dark:text-gray-200">
                            @error('name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="custom_domain" class="mb-2 block text-sm font-bold text-gray-700 dark:text-gray-200">{{ __('panel.sites.custom_domain_optional') }}</label>
                            <input type="text" name="custom_domain" id="custom_domain" value="{{ old('custom_domain') }}" class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight shadow focus:outline-none dark:bg-gray-700 dark:text-gray-200">
                            @error('custom_domain')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="inline-flex items-center rounded-md border border-transparent bg-gimysite-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gimysite-700 focus:outline-none focus:ring-2 focus:ring-gimysite-500 focus:ring-offset-2">
                            {{ __('panel.sites.create_button') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection