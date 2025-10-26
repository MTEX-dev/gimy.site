@extends('layouts.app', ['hideFooter' => true])
@section('title', __('pages.legal.' . $section . '.title') . ' - ' . config('app.name'))

@section('content')
    <div class="container mx-auto max-w-6xl px-4 py-8 lg:py-16">
        <div class="flex flex-col gap-6 lg:flex-row lg:gap-8">
            <!-- Navigation -->
            <nav
                class="h-fit w-full rounded-lg bg-white p-3 shadow-md dark:bg-gray-800 lg:sticky lg:top-20 lg:w-1/4"
            >
                <ul class="space-y-0">
                    @foreach ($validSections as $validSection)
                        <li>
                            <a
                                href="{{ route('pages.legal', ['section' => $validSection]) }}"
                                class="block rounded-md px-3 py-1.5 text-base text-gray-700 transition-colors hover:text-gimysite-600 dark:text-gray-300 dark:hover:text-gimysite-400 @if ($section === $validSection) bg-gimysite-100 font-semibold text-gimysite-700 dark:bg-gimysite-700 dark:text-gimysite-100 @endif"
                            >
                                {{ __('pages.legal.' . $validSection . '.title') }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <!-- Content -->
            <div
                class="w-full rounded-lg bg-white p-4 shadow-md dark:bg-gray-800 sm:p-6 lg:w-3/4 lg:p-8"
            >
                <div class="mb-1">
                    <h1
                        class="text-2xl font-bold text-gray-900 dark:text-gray-100 sm:text-3xl"
                    >
                        {{ __('pages.legal.' . $section . '.title') }}
                    </h1>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        {{ __('pages.legal.last_fetched') }}
                        {{ \Carbon\Carbon::now()->format('F j, Y') }}
                    </p>
                </div>

                <div class="overflow-y-auto lg:max-h-[70vh] lg:pr-4">
                    <article
                        class="prose prose-sm prose-gimysite max-w-none dark:prose-invert sm:prose"
                    >
                        <div class="text-gray-800 dark:text-gray-200">
                            {!! Str::markdown(__('pages.legal.' . $section . '.content')) !!}
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="container mx-auto mt-8 max-w-6xl px-4">
        <div
            class="rounded-lg bg-white p-4 shadow-md dark:bg-gray-800 sm:p-6 lg:p-8"
        >
            <div
                class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8"
            >
                <div>
                    <h3
                        class="mb-1 font-semibold text-gray-900 dark:text-gray-100"
                    >
                        Company
                    </h3>
                    <ul class="space-y-0">
                        <li>
                            <a
                                href="/"
                                class="text-gray-600 transition-colors hover:text-gimysite-600 dark:text-gray-400 dark:hover:text-gimysite-400"
                            >
                                Home
                            </a>
                        </li>
                        <li>
                            <a
                                href="/status"
                                class="text-gray-600 transition-colors hover:text-gimysite-600 dark:text-gray-400 dark:hover:text-gimysite-400"
                            >
                                Status
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3
                        class="mb-1 font-semibold text-gray-900 dark:text-gray-100"
                    >
                        Product
                    </h3>
                    <ul class="space-y-0">
                        <li>
                            <a
                                href="/dashboard"
                                class="text-gray-600 transition-colors hover:text-gimysite-600 dark:text-gray-400 dark:hover:text-gimysite-400"
                            >
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a
                                href="/sitemap"
                                class="text-gray-600 transition-colors hover:text-gimysite-600 dark:text-gray-400 dark:hover:text-gimysite-400"
                            >
                                Sitemap
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3
                        class="mb-1 font-semibold text-gray-900 dark:text-gray-100"
                    >
                        Legal
                    </h3>
                    <ul class="space-y-0">
                        @foreach ($validSections as $validSection)
                            <li>
                                <a
                                    href="{{ route('pages.legal', ['section' => $validSection]) }}"
                                    class="text-gray-600 transition-colors hover:text-gimysite-600 dark:text-gray-400 dark:hover:text-gimysite-400"
                                >
                                    {{ __('pages.legal.' . $validSection . '.title') }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div
                class="mt-8 text-center text-sm text-gray-500 dark:text-gray-400 lg:mt-12"
            >
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights
                reserved.
            </div>
        </div>
    </footer>
@endsection