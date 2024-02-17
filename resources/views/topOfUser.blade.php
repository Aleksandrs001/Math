<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>
        {{ __('messages.topOfUser') }}
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')
    <!-- Page Heading -->
    <header class="bg-white dark:bg-gray-800 shadow">

    </header>
    <main>
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div id='minusX' style=" background-color: ghostwhite; padding: 10px; color: black; border-radius: 10px;">
                List of top users:<br>
                @foreach($res as $key => $resultOfTop)
                    {{$key + 1}}.
                    User name: {{ucfirst($resultOfTop['user_name'])}}
                    User email: {{$resultOfTop['user_email']}}
                    Played Game Count: {{$resultOfTop['count']}}
                    Loss game count: {{$resultOfTop['loss']}}
                    Ratio: {{$resultOfTop['ratio']}}<br>
                @endforeach

            </div>
        </div>
    </main>
</div>
</body>
</html>
@include('script')
