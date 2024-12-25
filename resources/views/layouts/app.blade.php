<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Add custom CSS -->

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <script src="{{ asset('js/script.js') }}" defer></script> <!-- Add custom JS -->
</head>
<body>
    <div class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation') <!-- Navigation bar -->

            <main>
                @yield('content') <!-- Main content -->
            </main>
        </div>
    </div>
</body>
</html>
