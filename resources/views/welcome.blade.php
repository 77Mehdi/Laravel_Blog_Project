<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <nav class="bg-gray-700 border-gray-100 flex justify-between h-16  ">
        <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center mx-20">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-red-600" />
                </a>
            </div>

            <!-- Navigation Links -->

        </div>
        <div class="justify-end flex">
            @if (Route::has('login'))
                <div class="  font-bold  mx-8 mt-4 ">
                    @auth
                        <a href="{{ url('/dashboard') }}" class=" font-semibold text-gray-900 hover:text-gray-900 dark:text-gray-900 dark:hover:text-gray-400 mx-6 ">
                    home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-900 dark:hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-900 dark:hover:text-gray-400 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
</nav>

{{-- @foreach ($posts as $post)
        {{ $post->title }}
    @endforeach --}}

<x-blogs :posts="$posts" />



<x-footer/>
</body>

</html>
