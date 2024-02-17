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
            <div id='topOfUsers' style="background-color: ghostwhite; padding: 10px; color: black;">
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                    <tr>
                        <th style="border: 1px solid black; border-radius: 10px; text-align: center;">#</th>
                        <th style="border: 1px solid black; border-radius: 10px; text-align: center;">{{ __('messages.user_name') }}</th>
                        <th style="border: 1px solid black; border-radius: 10px; text-align: center;">{{ __('messages.user_email') }}</th>
                        <th style="border: 1px solid black; border-radius: 10px; text-align: center;">{{ __('messages.played_game_count') }}</th>
                        <th style="border: 1px solid black; border-radius: 10px; text-align: center;">{{ __('messages.loss_game_count') }}</th>
                        <th style="border: 1px solid black; border-radius: 10px; text-align: center;">{{ __('messages.ratio') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($res as $key => $resultOfTop)
                        <tr style="@if(isset($resultOfTop['thisUser'])) background-color: blue; color: white; @endif">
                            <td style="border: 1px solid black; text-align: center;">{{$key + 1}}</td>
                            <td style="border: 1px solid black; text-align: center;">{{ucfirst($resultOfTop['user_name'])}}</td>
                            <td style="border: 1px solid black; text-align: center;">{{$resultOfTop['user_email']}}</td>
                            <td style="border: 1px solid black; text-align: center;">{{$resultOfTop['count']}}</td>
                            <td style="border: 1px solid black; text-align: center;">{{$resultOfTop['loss']}}</td>
                            <td style="border: 1px solid black; text-align: center;">{{$resultOfTop['ratio']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </main>
</div>
</body>
</html>
@include('script')
