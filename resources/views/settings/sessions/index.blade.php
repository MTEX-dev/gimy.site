@extends('layouts.settings')

@section('settings-content')
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('settings.sessions.title') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('settings.sessions.description') }}
            </p>

            <div class="mt-6 space-y-6">
                @foreach ($sessions as $session)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div>
                                @if ($session->agent->isDesktop())
                                    <svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25A2.25 2.25 0 015.25 3h13.5A2.25 2.25 0 0121 5.25z"/>
                                    </svg>
                                @else
                                    <svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/>
                                    </svg>
                                @endif
                            </div>

                            <div class="ml-3">
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $session->agent->platform() ? $session->agent->platform() : 'Unknown' }}
                                    - {{ $session->agent->browser() ? $session->agent->browser() : 'Unknown' }}
                                </div>

                                <div>
                                    <div class="text-xs text-gray-500">
                                        {{ $session->ip_address }},

                                        @if ($session->is_current_device)
                                            <span class="text-green-500 font-semibold">{{ __('settings.sessions.this_device') }}</span>
                                        @else
                                            {{ __('settings.sessions.last_active') }} {{ $session->last_active }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (!$session->is_current_device)
                            <form action="{{ route('settings.sessions.destroy', $session->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-danger-button type="submit">
                                    {{ __('settings.sessions.logout_button') }}
                                </x-danger-button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="flex items-center mt-6">
                <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-session-logout')">
                    {{ __('settings.sessions.logout_others_button') }}
                </x-danger-button>
            </div>


            <x-modal name="confirm-session-logout" :show="$errors->sessionLogout->isNotEmpty()" focusable>
                <form method="post" action="{{ route('settings.sessions.destroy-others') }}" class="p-6">
                    @csrf
                    @method('DELETE')

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('settings.sessions.modal_title') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('settings.sessions.modal_description') }}
                    </p>

                    <div class="mt-6">
                        <x-input-label for="password" value="{{ __('settings.sessions.password_label') }}" class="sr-only"/>

                        <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="{{ __('settings.sessions.password_placeholder') }}"
                        />

                        <x-input-error :messages="$errors->sessionLogout->get('password')" class="mt-2"/>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('settings.sessions.cancel_button') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3">
                            {{ __('settings.sessions.logout_others_button') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        </div>
    </div>
@endsection
