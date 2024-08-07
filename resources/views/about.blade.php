<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>
        {{ __('messages.about') }}
    </title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Other head elements... -->
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @if (!empty($user))
    @include('layouts.navigation')
    @endif
    <!-- Page Heading -->
    <header class="bg-white dark:bg-gray-800 shadow">

    </header>
    <main>
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div id='topOfUsers' style="background-color: ghostwhite; padding: 10px; color: black;">
                You can buy developers tea or cup of coffee. <br>
                <div> Revolute Bank</div>
                <button id="copyButton1" onclick="copyTextToClipboard('first')">Copy IBAN:</button>

                <div id="first">
                    LT68 3250 0247 1666 9628
                </div>
                <button id="copyButton2" onclick="copyTextToClipboard('second')">Copy BIC:</button>

                <div id="second">
                    REVOLT21
                </div>
                <div>Contact: <a href="mailto:children.match.contact.us@gmail.com">children.match.contact.us@gmail.com</a></div>
                @if (empty($user))
                    <a href="/" class="btn btn-default">Back</a>
                @endif
            </div>
        </div>


    </main>
</div>
</body>
</html>
@include('script')
