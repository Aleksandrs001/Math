<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ __('messages.wrong_answers') }}
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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <pre>
{{--                    {{ var_dump($wrongAnswers) }}--}}
                    </pre>
                    @foreach($wrongAnswers as $key => $value)
                        {{ $key +1 }}: ) competition {{ $value['competition'] }} example {{ $value['full'] }}  wrong answer {{ $value['result']  }}<br>

                    @endforeach
                </div>
            </div>
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div id='working_on_it' style=" background-color: ghostwhite; padding: 10px; color: black; border-radius: 10px;">
                {{__('messages.working')}}

            </div>
        </div>
    </main>
</div>
</body>
</html>
@include('script')
