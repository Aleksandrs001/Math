
@foreach($res as $index => $r)
    <div id="yellowBubble" style="display: none; background-color: yellow; padding: 10px; color: black;">
        Введите целое число.
    </div>
    <div id="redBubble" style="display: none; background-color: red; padding: 10px; color: white;">
        Попробуй еще! Правильный ответ: {{$r['result']}}
    </div>

    <div id="greenBubble" style="display: none; background-color: green; padding: 10px; color: white;">
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
            <input type="hidden" id="correct_{{$index}}" name="correct" value="1"/>
            <button type="button" onclick="submitAnswer({{$index}})">Сохранить</button>
            <button type="submit" style="display: none;"></button> <!-- Hidden submit button -->
        </form>
    </div>
@endforeach

{{--@extends('layouts.app')--}}

@include('script')
