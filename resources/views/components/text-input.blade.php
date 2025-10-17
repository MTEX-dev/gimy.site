@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gimysite-500-light dark:focus:border-gimysite-500 focus:ring-gimysite-500 dark:focus:ring-gimysite-500 rounded-md shadow-sm']) }}>