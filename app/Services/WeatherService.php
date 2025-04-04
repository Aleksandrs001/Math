<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class WeatherService
{

    public function getWeather()
    {
        $filePath = storage_path('app/weather.json');
        $logPath = storage_path('logs/weather_attempts.log'); // Путь для логирования

        if (!file_exists($filePath)) {
            file_put_contents($filePath, json_encode([]));
        }
        $nowTime = time();
        $weatherData = json_decode(file_get_contents($filePath), true);

        if (!empty($weatherData) && $nowTime < $weatherData['dt'] + 100) {
            return $weatherData;
        }else {
            $attempts = file_exists($logPath) ? count(file($logPath)) + 1 : 1;  // Читаем количество строк в логе для подсчета попыток

            file_put_contents($logPath, "Attempt #{$attempts} at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);

            if (file_exists($logPath) && time() - filemtime($logPath) > 7 * 24 * 60 * 60) {
                unlink($logPath);
            }


            $weatherData = $this->fetchWeatherFromApi();

            if ($weatherData) {
                $weatherData['dt'] = $nowTime; // Добавляем время последнего обновления
                file_put_contents($filePath, json_encode($weatherData));
            }

            return $weatherData;
        }
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
