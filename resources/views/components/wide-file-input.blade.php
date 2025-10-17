@props(['disabled' => false, 'accept' => null])

<div class="relative">
    <input 
        type="file"
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'peer absolute inset-0 w-full h-full opacity-0 cursor-pointer disabled:cursor-not-allowed z-10']) !!}
        @if($accept) accept="{{ $accept }}" @endif
    >
    
    <div class="flex items-center justify-between w-full px-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm transition-all duration-200 
                peer-hover:border-gray-400 dark:peer-hover:border-gray-500 
                peer-focus:ring-2 peer-focus:ring-indigo-500 dark:peer-focus:ring-indigo-400 peer-focus:ring-offset-2 dark:peer-focus:ring-offset-gray-800 peer-focus:border-indigo-500 dark:peer-focus:border-indigo-400
                peer-disabled:opacity-50 peer-disabled:cursor-not-allowed">
        
        <div class="flex items-center gap-3 min-w-0 flex-1">
            <!-- Icon -->
            <div class="shrink-0">
                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            
            <!-- Text -->
            <div class="min-w-0 flex-1">
                <p class="text-sm text-gray-700 dark:text-gray-300 truncate">
                    <span class="font-medium peer-has-[:disabled]:text-gray-500">{{ __('Choose file') }}</span>
                    <span class="text-gray-500 dark:text-gray-400 ml-1" x-text="$el.parentElement.parentElement.querySelector('input[type=file]').files[0]?.name || '{{ __('or drag and drop') }}'"></span>
                </p>
            </div>
        </div>
        
        <!-- Button -->
        <div class="shrink-0 ml-3">
            <span class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                {{ __('Browse') }}
            </span>
        </div>
    </div>
</div>