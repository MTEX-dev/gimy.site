<div
    x-data="{ show: false, search: '' }"
    x-on:toggle-search-modal.window="show = !show; $nextTick(() => { if (show) $refs.searchInput.focus(); })"
    x-on:keydown.window.prevent.cmd.k="show = true; $nextTick(() => { if (show) $refs.searchInput.focus(); })"
    x-on:keydown.window.prevent.ctrl.k="show = true; $nextTick(() => { if (show) $refs.searchInput.focus(); })"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    class="fixed inset-0 z-50 overflow-y-auto"
    aria-labelledby="search-modal-title"
    role="dialog"
    aria-modal="true"
    style="display: none;"
>
    <div
        class="flex min-h-screen items-end justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0"
    >
        <div
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity dark:bg-gray-900 dark:bg-opacity-75"
            aria-hidden="true"
        ></div>

        <span
            class="hidden sm:inline-block sm:h-screen sm:align-middle"
            aria-hidden="true"
            >&#8203;</span
        >
        <div
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all dark:bg-gray-800 sm:my-8 sm:w-full sm:max-w-lg sm:align-middle"
        >
            <div
                class="bg-white px-4 pb-4 pt-5 dark:bg-gray-800 sm:p-6 sm:pb-4"
            >
                <div class="sm:flex sm:items-start">
                    <div
                        class="mt-3 w-full text-center sm:ml-4 sm:mt-0 sm:text-left"
                    >
                        <h3
                            class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100"
                            id="search-modal-title"
                        >
                            {{ __('strings.search') }}
                        </h3>
                        <div class="mt-2">
                            <input
                                x-ref="searchInput"
                                type="text"
                                x-model="search"
                                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-gimysite-500 focus:outline-none focus:ring-gimysite-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                                placeholder="{{ __('strings.search') . '...' }}"
                            />
                        </div>

                        <div
                            class="mt-4 max-h-[320px] overflow-y-auto scroll-py-2"
                        >
                            <template
                                x-if="search === '' || 'organisation'.includes(search.toLowerCase())"
                            >
                                <div class="pb-2">
                                    <div
                                        class="p-2 text-xs font-medium text-gray-500 dark:text-gray-400"
                                    >
                                        {{ __('panel.organisations.item_name') }}
                                    </div>
                                    <a
                                        href="{{ route('panel.overview', $organisation->slug ?? 'default') }}"
                                        class="relative flex cursor-default items-center gap-2 rounded-md px-2 py-1.5 text-sm outline-hidden data-[selected='true']:bg-hovered data-[selected=true]:text-strong hover:bg-gray-100 dark:hover:bg-gray-700"
                                        :class="{ 'bg-hovered text-strong': search.toLowerCase() === 'overview' }"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            class="size-5 shrink-0 fill-none stroke-current stroke-[1.8]"
                                        >
                                            <path
                                                d="M9.5 16.7501V20.25H5.74999C4.64542 20.25 3.75 19.3547 3.75 18.2501V9.95996C3.75 9.30045 4.07513 8.68335 4.61907 8.31042L10.8691 4.02539C11.5506 3.55811 12.4494 3.55811 13.1309 4.02539L19.3809 8.31042C19.9249 8.68335 20.25 9.30045 20.25 9.95996V18.2501C20.25 19.3547 19.3547 20.25 18.2501 20.25H14.5V16.7501C14.5 15.3693 13.3807 14.25 12 14.25C10.6193 14.25 9.5 15.3693 9.5 16.7501Z"
                                            ></path>
                                        </svg>
                                        {{ __('panel.overview') }}
                                    </a>
                                    <a
                                        href="{{ route('panel.organisations.sites', $organisation->slug ?? 'default') }}"
                                        class="relative flex cursor-default items-center gap-2 rounded-md px-2 py-1.5 text-sm outline-hidden data-[selected='true']:bg-hovered data-[selected=true]:text-strong hover:bg-gray-100 dark:hover:bg-gray-700"
                                        :class="{ 'bg-hovered text-strong': search.toLowerCase() === 'sites' }"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            class="size-5 shrink-0 fill-none stroke-current stroke-[1.8]"
                                            data-slot="icon"
                                        >
                                            <path
                                                d="M3.75 6.95C3.75 5.8299 3.75 5.26984 3.96799 4.84202C4.15973 4.46569 4.46569 4.15973 4.84202 3.96799C5.26984 3.75 5.8299 3.75 6.95 3.75H10.25V10.25H3.75V6.95ZM13.75 3.75H17.05C18.1701 3.75 18.7302 3.75 19.158 3.96799C19.5343 4.15973 19.8403 4.46569 20.032 4.84202C20.25 5.26984 20.25 5.8299 20.25 6.95V10.25H13.75V3.75ZM3.75 13.75H10.25V20.25H6.95C5.8299 20.25 5.26984 20.25 4.84202 20.032C4.46569 19.8403 4.15973 19.5343 3.96799 19.158C3.75 18.7302 3.75 18.1701 3.75 17.05V13.75ZM13.75 13.75H20.25V17.05C20.25 18.1701 20.25 18.7302 20.032 19.158C19.8403 19.5343 19.5343 19.8403 19.158 20.032C18.7302 20.25 18.1701 20.25 17.05 20.25H13.75V13.75Z"
                                            ></path>
                                        </svg>
                                        {{ __('panel.sites.sites_title') }}
                                    </a>
                                    <a
                                        href="{{ route('panel.organisations.settings', $organisation->slug ?? 'default') }}"
                                        class="relative flex cursor-default items-center gap-2 rounded-md px-2 py-1.5 text-sm outline-hidden data-[selected='true']:bg-hovered data-[selected=true]:text-strong hover:bg-gray-100 dark:hover:bg-gray-700"
                                        :class="{ 'bg-hovered text-strong': search.toLowerCase() === 'settings' }"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            class="size-5 shrink-0 fill-none stroke-current stroke-[1.8]"
                                        >
                                            <path
                                                d="M11.501 3.03727C11.8099 2.85944 12.1901 2.85944 12.499 3.03728L19.749 7.21147C20.059 7.38995 20.25 7.7204 20.25 8.0781V15.9218C20.25 16.2795 20.059 16.6099 19.749 16.7884L12.4989 20.9626C12.1901 21.1404 11.8099 21.1404 11.501 20.9626L4.25107 16.7887C3.94106 16.6102 3.75 16.2798 3.75 15.9221L3.75 8.07807C3.75 7.72038 3.94105 7.38992 4.25104 7.21145L11.501 3.03727ZM15.25 12C15.25 13.7949 13.795 15.25 12 15.25C10.2051 15.25 8.75003 13.7949 8.75003 12C8.75003 10.2051 10.2051 8.75 12 8.75C13.795 8.75 15.25 8.20507 15.25 12Z"
                                            ></path>
                                        </svg>
                                        {{ __('panel.organisations.settings') }}
                                    </a>
                                </div>
                            </template>

                            <template
                                x-if="search === '' || 'navigation'.includes(search.toLowerCase())"
                            >
                                <div class="pb-2">
                                    <div
                                        class="p-2 text-xs font-medium text-gray-500 dark:text-gray-400"
                                    >
                                        {{ __('panel.navigation') }}
                                    </div>
                                    <a
                                        href="{{ route('settings.profile') }}"
                                        class="relative flex cursor-default items-center gap-2 rounded-md px-2 py-1.5 text-sm outline-hidden data-[selected='true']:bg-hovered data-[selected=true]:text-strong hover:bg-gray-100 dark:hover:bg-gray-700"
                                        :class="{ 'bg-hovered text-strong': search.toLowerCase() === 'account' }"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            class="size-5 shrink-0 fill-none stroke-current stroke-[1.8]"
                                        >
                                            <path
                                                d="M5.85697 18.9157C7.17056 16.9968 9.33203 15.75 12 15.75C14.668 15.75 16.8294 16.9968 18.143 18.9157M5.85697 18.9157C7.49061 20.3679 9.6423 21.25 12 21.25C14.3577 21.25 16.5094 20.3679 18.143 18.9157M5.85697 18.9157C3.95086 17.2214 2.75 14.7509 2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 14.7509 20.0491 17.2214 18.143 18.9157M15.25 10C15.25 11.7949 13.7949 13.25 12 13.25C10.2051 13.25 8.75 11.7949 8.75 10C8.75 8.20507 10.2051 6.75 12 6.75C13.7949 6.75 15.25 8.20507 15.25 10Z"
                                            ></path>
                                        </svg>
                                        {{ __('settings.nav.profile') }}
                                    </a>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-row-reverse justify-end bg-gray-50 px-4 py-3 dark:bg-gray-700 sm:flex sm:px-6"
            >
                <button
                    @click="show = false"
                    type="button"
                    class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gimysite-500 focus:ring-offset-2 dark:border-gray-500 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700 sm:ml-3 sm:mt-0 sm:w-auto sm:text-sm"
                >
                    {{ __('strings.close') }}
                </button>
            </div>
        </div>
    </div>
</div>