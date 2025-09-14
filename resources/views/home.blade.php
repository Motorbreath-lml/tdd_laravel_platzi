<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {{-- Usando Laravel 9 con webpack --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    {{-- De Laravel 9 para arriba usando Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Ejecutar en la terminal npm run build --}}
</head>

<body class="bg-gray-200">

    {{-- Menu de navegacion --}}
    <header class="bg-gray-100 shadow mb-5">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col sm:flex-row justify-between sm:items-center p-4 sm:h-16">

                <!-- Logo o Título -->
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold">Repositorios</h1>
                </div>

                <nav class="flex flex-col sm:flex-row items-end gap-2 sm:gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-600">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-green-500 text-white px-4 py-2 rounded-md text-sm hover:bg-green-600">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="bg-gray-500 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-600">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            </div>
        </div>
    </header>


    <div>
        <ul class="max-w-prose mx-auto bg-white border-r-3 border-gray-300 shadow-xl">
            @foreach ($repositories as $repository)
                <li class="flex item-center text-black p-2 hover:bg-gray-300">
                    <img src="{{ $repository->user->profile_photo_url }}" alt="{{ $repository->user->name }}"
                        class="w-12 h-12 rounded-full mr-2">
                    <div class="flex justify-between w-full">
                        <div class="flex-1">
                            <h2 class="text-sm font-semibold text-black">
                                {{ $repository->url }}
                            </h2>
                            <p>
                                {{ $repository->description }}
                            </p>
                        </div>
                        <span class="text-sm font-medium text-gray-600">
                            {{ $repository->created_at->diffForHumans() }}
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</body>

</html>
