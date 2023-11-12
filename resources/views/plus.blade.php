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
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
            <div id='minus' style=" background-color: ghostwhite; padding: 10px; color: black;  border-radius: 10px;">
                @foreach($res as $index => $r)
                    <div id="yellowBubble" style="display: none; background-color: yellow; padding: 10px; color: black; border-radius: 10px;">
                        Введите целое число.
                    </div>
                    <div id="redBubble" style="display: none; background-color: red; padding: 10px; color: white; border-radius: 10px;">
                        Попробуй еще! Правильный ответ: {{$r['result']}}
                    </div>

                    <div id="greenBubble" style="display: none; background-color: green; padding: 10px; color: white; border-radius: 10px;">
                        Ты молодец!
                    </div>
                    <div>
                        <h1>{{$r['first']}} {{$r['operation']}} {{$r['second']}} {{$r['equal']}}</h1>

                        <form id="answerForm_{{$index}}" data-index="{{$index}}" class="answer-form">
                            @csrf
                            @method('POST')
                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <label for="answer_{{$index}}"> {{$r['userName']}}, твой ответ:</label>
                            <input type="number" id="answer_{{$index}}" name="answer" pattern="[0-9]*" value=""/>
                            <input type="hidden" id="result_{{$index}}" name="result" value="{{$r['result']}}"/>
                            <button type="button" onclick="submitAnswer({{$index}})">Сохранить</button>
                            <button type="submit" style="display: none;"></button>
                        </form>
                    </div>
                @endforeach
            </div>



        </div>
    </main>
</div>
</body>
</html>
@include('script')

