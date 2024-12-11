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

    public static function getMultiplyMenu(): array
    {
        return [
            'multiply' => 'messages.multiply',
        ];
    }

    public static function getDivideMenu(): array
    {
        return [
            'divide' => 'messages.divide',
            'longDivideWithoutReminder' => 'divide.long_divide_without_reminder',
        ];
    }

    public static function getOtherMenu(): array
    {
        return [
            'view' => 'messages.topOfUser',
            'wrongAnswers' => 'messages.wrong_answers',
        ];
    }

    public static function getAllLanguages(): array
    {
        return [
            'en' => __('messages.en_lang'),
            'ru' => __('messages.ru_lang'),
            'lv' => __('messages.lv_lang'),
        ];
    }
    public static function isMobile(): bool
    {
        return preg_match('/(android|iphone|ipad|ipod|blackberry|windows phone)/i', $_SERVER['HTTP_USER_AGENT']);
    }
}
