@extends('layouts.panel')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $organisation->name }} Members
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-4">Add New Member</h3>
                    <form action="{{ route('panel.organisations.members.add', $organisation) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Member Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                                <select name="role" id="role" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                    <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @error('role')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gimysite-600 hover:bg-gimysite-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500">
                            Add Member
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-4">Organisation Members</h3>
                    @if ($members->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">This organisation has no members yet (besides you).</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Role</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach ($members as $member)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $member->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $member->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                                <form action="{{ route('panel.organisations.members.updateRole', [$organisation, $member]) }}" method="POST" class="inline-flex">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="role" onchange="this.form.submit()"
                                                        class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 text-sm">
                                                        <option value="member" {{ $member->pivot->role == 'member' ? 'selected' : '' }}>Member</option>
                                                        <option value="admin" {{ $member->pivot->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                @if (Auth::id() !== $member->id)
                                                    <form action="{{ route('panel.organisations.members.remove', [$organisation, $member]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this member?');" class="inline-flex ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200">Remove</button>
                                                    </form>
                                                @else
                                                    <span class="text-gray-500 dark:text-gray-400">You</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection