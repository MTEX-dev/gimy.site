@extends('layouts.panel')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Create a new Site for {{ $organisation->name }}</h1>

    <form action="{{ route('panel.organisations.sites.store', $organisation) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Site Name</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="custom_domain" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Custom Domain (optional)</label>
            <input type="text" name="custom_domain" id="custom_domain" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 dark:bg-gray-800 leading-tight focus:outline-none focus:shadow-outline">
            @error('custom_domain')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create Site
        </button>
    </form>
</div>
@endsection
