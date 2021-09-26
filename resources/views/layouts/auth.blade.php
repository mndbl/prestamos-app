@extends('layouts.base')

@section('body')
    <div class="flex flex-col justify-center mt-4 items-center bg-gray-50 sm:px-6 lg:px-8">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
