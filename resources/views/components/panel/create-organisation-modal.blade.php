<div
  x-data="{ createOrganizationModal: false, organizationName: '' }"
  x-init="
    $watch('createOrganizationModal', (value) => {
        if (value) {
            $nextTick(() => $refs.organizationNameInput.focus());
        }
    });
  "
>
  <template x-teleport="body">
    <div
      x-show="createOrganizationModal"
      x-cloak
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto"
      aria-labelledby="modal-title"
      role="dialog"
      aria-modal="true"
    >
      <!-- Overlay -->
      <div
        x-show="createOrganizationModal"
        @click="createOrganizationModal = false"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
      ></div>

      <!-- Modal panel -->
      <div
        x-show="createOrganizationModal"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:w-full sm:max-w-lg p-6"
      >
        <form
          @submit.prevent="
            fetch('{{ route('panel.organisations.create') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ name: organizationName })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Organization created:', data);
                createOrganizationModal = false;
                organizationName = '';
                // Optional: Emit a custom event if you need to react to this in other components
                // $dispatch('organization-created', data);
            })
            .catch(error => {
                console.error('Error creating organization:', error);
                // Handle errors, e.g., show a message to the user
            });
          "
        >
          <div class="sm:flex sm:items-start">
            <div
              class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 dark:bg-indigo-700 sm:mx-0 sm:h-10 sm:w-10"
            >
              <svg
                class="h-6 w-6 text-indigo-600 dark:text-indigo-200"
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
                id="modal-title"
              >
                {{
                  __('panel.create_name_item', [
                    'item' => __('panel.organisations.item_name'),
                  ])
                }}
              </h3>
              <div class="mt-4">
                <label
                  for="organization-name"
                  class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                  >{{ __('panel.organisations.name') }}</label
                >
                <div class="mt-1">
                  <input
                    type="text"
                    name="organization-name"
                    id="organization-name"
                    x-ref="organizationNameInput"
                    x-model="organizationName"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    placeholder="{{ __('panel.organisations.name_placeholder') }}"
                    required
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
            <button
              type="submit"
              class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 sm:ml-3 sm:w-auto sm:text-sm"
            >
              {{ __('strings.create') }}
            </button>
            <button
              type="button"
              class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-600 dark:focus:ring-offset-gray-800 sm:mt-0 sm:w-auto sm:text-sm"
              @click="createOrganizationModal = false"
            >
              {{ __('strings.cancel') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
</div>