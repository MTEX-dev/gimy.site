@props(['href', 'active', 'text'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gimysite-600 focus:outline-none focus:bg-gimysite-700 transition ease-in-out duration-150'
            : 'inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 dark:text-gray-300 hover:text-gimysite-600 dark:hover:text-gimysite-400 hover:bg-gimysite-50 dark:hover:bg-gray-700 focus:outline-none focus:text-gimysite-600 dark:focus:text-gimysite-400 focus:bg-gimysite-50 dark:focus:bg-gray-700 active:bg-gimysite-100 dark:active:bg-gray-800 transition ease-in-out duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} href="{{ $href }}">
    {{ $text }}
</a>