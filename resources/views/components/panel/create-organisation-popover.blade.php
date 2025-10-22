<div x-data="{ organizationName: '' }">
  <div
    popover
    id="create-organization-popover"
    class="p-0 border-0 bg-transparent shadow-none"
    style="margin: 0;"
  >
    <div
      class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-40"
      popovertarget="create-organization-popover"
      popovertargetaction="hide"
      @click="organizationName = ''"
    ></div>

    <div
      class="fixed inset-0 flex items-center justify-center p-4 z-50"
      x-cloak
    >
      <div
        class="relative bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:w-full sm:max-w-lg p-6"
        @click.stop
      >
        <form action="{{ route('panel.organisations.store') }}" method="POST">
          @csrf
          <div class="sm:flex sm:items-start">
            <div
              class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gimysite-100 dark:bg-gimysite-700 sm:mx-0 sm:h-10 sm:w-10"
            >
              <svg
                class="h-6 w-6 text-gimysite-600 dark:text-gimysite-200"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 4.5v15m7.5-7.5h-15"
                />
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
              <h3
                class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100"
                id="popover-title"
              >
                {{
                  __('panel.new_name_item', [
                    'item' => __('panel.organisations.item_name'),
                  ])
                }}
              </h3>
              <div class="mt-4">
                <label
                  for="organization-name-input"
                  class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                  >{{ __('panel.organisations.name') }}</label
                >
                <div class="mt-1">
                  <input
                    type="text"
                    name="name"
                    id="organization-name-input"
                    x-model="organizationName"
                    class="shadow-sm focus:ring-gimysite-500 focus:border-gimysite-500 block w-full sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    placeholder="{{ __('panel.organisations.name_placeholder') }}"
                  />
                </div>
                @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
            <button
              type="submit"
              class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gimysite-600 text-base font-medium text-white hover:bg-gimysite-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500 dark:focus:ring-offset-gray-800 sm:ml-3 sm:w-auto sm:text-sm"
            >
              {{ __('strings.create') }}
            </button>
            <button
              type="button"
              popovertarget="create-organization-popover"
              popovertargetaction="hide"
              @click="organizationName = ''"
              class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gimysite-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-600 dark:focus:ring-offset-800 sm:mt-0 sm:w-auto sm:text-sm"
            >
              {{ __('strings.cancel') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>