<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Support\Facades\Log;

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

    public static  function weather() {
        $weather = (new WeatherService)->getWeather();
        if (empty($weather['cod']) || $weather['cod'] != 200) {
            return [];
        }
        return [
            'icon' => 'https://openweathermap.org/img/wn/' . $weather['weather'][0]['icon'] . '@2x.png',
            'temp' => round($weather['main']['temp'], 1),
            'temp_min' => round($weather['main']['temp_min'], 1),
            'temp_max' => round($weather['main']['temp_max'], 1),
            'humidity' => $weather['main']['humidity'],
            'pressure' => $weather['main']['pressure'],
            'wind' => $weather['wind']['speed'],
            'description' => $weather['weather'][0]['description'],
            'city' => $weather['name'],
            'country' => $weather['sys']['country'],
        ];
    }
}
