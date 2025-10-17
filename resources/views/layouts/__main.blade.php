@section('layout-content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('components.navbar')

    <!-- Page Heading -->
    @hasSection('header')
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @yield('header')
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        @yield('layout-content')
    </main>
</div>
@endsection