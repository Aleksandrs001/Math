<?php

namespace App\Http\Controllers;

class NavigationController extends Controller
{

    public static function getPlusMenu(): array
    {
        return [
            'plus' => 'messages.plus',
            'plusFindX' => 'messages.plus_find_x',
        ];
    }

    public static function getMinusMenu(): array
    {
        return [
            'minus' => 'messages.minus',
            'minusFindX' => 'messages.minus_find_x',
        ];
    }
    public static function getOtherMenu(): array
    {
        return [
            'multiply' => 'messages.multiply',
            'divide' => 'messages.divide',
            'view' => 'messages.topOfUser',
            'wrongAnswers' => 'messages.wrong_answers',
        ];
    }

    public static function getAllLanguages(): array
    {
        return [
            'en' => 'English',
            'ru' => 'Russian',
            'lv' => 'Latvian',
        ];
    }
}
