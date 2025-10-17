@props(['type' => 'info', 'message'])

@php
    $classes = [
        'success' => 'bg-green-100 border border-green-400 text-green-700 dark:bg-green-900/50 dark:border-green-800 dark:text-green-300',
        'error' => 'bg-red-100 border border-red-400 text-red-700 dark:bg-red-900/50 dark:border-red-800 dark:text-red-300',
        'warning' => 'bg-yellow-100 border border-yellow-400 text-yellow-700 dark:bg-yellow-900/50 dark:border-yellow-800 dark:text-yellow-300',
        'info' => 'bg-blue-100 border border-blue-400 text-blue-700 dark:bg-blue-900/50 dark:border-blue-800 dark:text-blue-300',
    ];

    $icon = [
        'success' => '<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>',
        'error' => '<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>',
        'warning' => '<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.333 2.645-1.333 3.41 0L15.3 11.099A4 4 0 0112.559 18H7.442a4 4 0 01-2.74-6.9L8.257 3.099zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>',
        'info' => '<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2h1a1 1 0 001-1V9a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>',
    ];
@endphp

@if ($message)
    <div class="mb-4 {{ $classes[$type] }} px-4 py-3 rounded relative flex items-center" role="alert">
        {!! $icon[$type] !!}
        <span class="block sm:inline">{{ $message }}</span>
    </div>
@endif