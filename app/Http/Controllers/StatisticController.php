<?php

namespace App\Http\Controllers;

use App\Services\StatisticService;
use App\Services\WeatherService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class StatisticController extends Controller
{
    public static function view(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $result = StatisticService::getTopOfUsersData();
        $weather = (new \App\Services\WeatherService)->getWeather();
        return view('topOfUser')->with(
            [
                'res' => $result,
                'weather' => $weather,
                'icon' => 'https://openweathermap.org/img/wn/' . $weather['weather'][0]['icon'] . '@2x.png',
                'temp' => $weather['main']['temp'],
                'temp_min' => $weather['main']['temp_min'],
                'temp_max' => $weather['main']['temp_max'],
                'humidity' => $weather['main']['humidity'],
                'pressure' => $weather['main']['pressure'],
                'wind' => $weather['wind']['speed'],
                'description' => $weather['weather'][0]['description'],
                'city' => $weather['name'],
                'country' => $weather['sys']['country'],
            ]
        );
    }
}
