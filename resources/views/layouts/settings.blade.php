@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="md:col-span-1">
                    <div class="sticky top-20">
                        @include('components.settings-nav')
                    </div>
                </div>
                <div class="md:col-span-3">
                    @yield('settings-content')
                </div>
            </div>
        </div>
    </div>
@endsection