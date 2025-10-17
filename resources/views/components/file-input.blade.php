@props(['disabled' => false])

<div x-data="{ focused: false, fileName: '' }" class="flex items-center">
    <input type="file"
           class="hidden"
           x-ref="fileInput"
           @change="fileName = $refs.fileInput.files[0] ? $refs.fileInput.files[0].name : ''"
           {{ $attributes }}
    >

    <button type="button"
            @click="$refs.fileInput.click()"
            @focus="focused = true"
            @blur="focused = false"
            class="px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gimysite-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
            :class="{ 'ring-2 ring-gimysite-500 ring-offset-2 dark:ring-offset-gray-800': focused }"
    >
        {{ __('Choose File') }}
    </button>

    <span x-text="fileName" class="ml-3 text-sm text-gray-500 dark:text-gray-400"></span>
</div>