<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>
        {{ __('messages.minus_find_x') }}
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
                @foreach($res as $index => $r)
                    <div id="yellowBubble" style="display: none; background-color: yellow; padding: 10px; color: black; border-radius: 10px;">
                        {{__("messages.enter_integer")}}
                    </div>
                    <div id="redBubble" style="display: none; background-color: red; padding: 10px; color: white; border-radius: 10px;">
                        {{__("messages.try_again")}} {{$r['second']}}
                    </div>
                    <div id="greenBubble" style="display: none; background-color: green; padding: 10px; color: white; border-radius: 10px;">
                        {{__("messages.you_are_right")}}
                    </div>
                    <div>
                        <h1 style="font-size: 24px;">{{$r['first']}} {{$r['operation']}} X {{$r['equal']}} {{$r['result']}}</h1>

                        <form id="answerForm_{{$index}}" data-index="{{$index}}" class="answer-form" autocomplete="off">
                            @csrf
                            @method('POST')
                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <label for="answer_{{$index}}"> {{$r['userName']}}, {{__('messages.your_answer')}}</label>
                            <input type="number" id="answer_{{$index}}" name="answer" pattern="[0-9]*" value="" style="border-radius: 5px;"/>
                            <input type="hidden" id="result_{{$index}}" name="result" value="{{$r['second']}}"/>
                            <input type="hidden" id="result2_{{$index}}" name="full" value="{{$r['first']}} {{$r['operation']}} X {{$r['equal']}} {{$r['result']}}" />
                            <input type="hidden" id="result2_{{$index}}" name="competition" value="minusX"/>
                            <button type="button" onclick="submitAnswer({{$index}})">{{__('messages.submit')}}</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>

        <footer class="fixed bottom-0 left-0 right-0 sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            {{--    <div class="flex flex-col justify-center mt-16 px-0 sm:flex-row sm:items-center sm:justify-between">--}}
            <div class="text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                <div class="flex items-center gap-4">
                    <a href="/about" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        Support us
                    </a>
                </div>
            </div>
            <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-center sm:ml-0">

                © 2024 Copyright Children-math
            </div>
            <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">

                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
            {{--    </div>--}}
        </footer>
    </main>

</div>


</body>

</html>
@include('script')

