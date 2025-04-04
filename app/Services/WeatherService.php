<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class WeatherService
{

    public function getWeather()
    {
        $filePath = storage_path('app/weather.json');
        if (!file_exists($filePath)) {
            file_put_contents($filePath, json_encode([]));
        }
        $nowTime = time();
        Log::debug($nowTime);
        $weatherData = json_decode(file_get_contents($filePath), true);
        if ($nowTime < $weatherData['dt'] + 3600) {
            return $weatherData;
        } else {
            file_put_contents($filePath, json_encode([]));
            Log::debug('Weather data is outdated, fetching new data');
        }
        if (!$weatherData) {
            $weatherData = $this->fetchWeatherFromApi();
            if ($weatherData) {
                file_put_contents($filePath, json_encode($weatherData));
            }
        }
        return $weatherData;
    }

    private function fetchWeatherFromApi()
    {
    $apiKey = env('WEATHER_API_KEY');
    $city = 'Riga';
    $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
    $response = file_get_contents($url);

    if ($response === false) {
        Log::error('Weather API request failed');
        return null;
    }
    $weatherData = json_decode($response, true);

    if ($weatherData === null) {
        Log::error('Failed to decode weather data');
        return null;
    }
        return $weatherData;
    }

}
