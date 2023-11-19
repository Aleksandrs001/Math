<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
            <div id='minus' style=" background-color: ghostwhite; padding: 10px; color: black; border-radius: 10px;">
                @foreach($res as $index => $r)
                    <div id="yellowBubble" style="display: none; background-color: yellow; padding: 10px; color: black; border-radius: 10px;">
                        {{__("messages.enter_integer")}}
                    </div>
                    <div id="redBubble" style="display: none; background-color: red; padding: 10px; color: white; border-radius: 10px;">
                        {{__("messages.try_again")}} {{$r['result']}}
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

                            <label for="answer_{{$index}}" > {{$r['userName']}}, {{__('messages.your_answer')}}</label>
                            <input type="number" id="answer_{{$index}}" name="answer" pattern="[0-9]*" value="" style="border-radius: 5px;"/>
                            <input type="hidden" id="result_{{$index}}" name="result" value="{{$r['second']}}"/>
                            <input type="hidden" id="result2_{{$index}}" name="competition" value="plusX"/>
                            <input type="hidden" id="result2_{{$index}}" name="full" value="{{$r['first']}} {{$r['operation']}} X {{$r['equal']}} {{$r['result']}}" />

                            <button type="button" onclick="submitAnswer({{$index}})">{{__('messages.submit')}}</button>
                        </form>
                    </div>
                    <button class="bg-sky-500 hover:bg-sky-700 ...">
                        Save changes
                    </button>
                @endforeach
            </div>


        </div>
    </main>
</div>
</body>
</html>
@include('script')

