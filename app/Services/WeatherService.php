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
        } else {
            $attempts = file_exists($logPath) ? count(file($logPath)) + 1 : 1;  // Читаем количество строк в логе для подсчета попыток

            file_put_contents($logPath, "Attempt #{$attempts} at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);

            if (file_exists($logPath) && time() - filemtime($logPath) > 7 * 24 * 60 * 60) {
                unlink($logPath);
            }


            $weatherData = $this->fetchWeatherFromApi();

            if ($weatherData) {
                $weatherData['dt'] = $nowTime; // Добавляем время последнего обновления
                file_put_contents($filePath, json_encode($weatherData, JSON_PRETTY_PRINT));
            }

            return $weatherData;
        }
    }


    private function fetchWeatherFromApi()
    {
        $apiKey = env('WEATHER_API_KEY');
        $city = 'Riga';
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch) || $httpCode !== 200) {
            Log::error('Weather API request failed: ' . curl_error($ch));
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        $weatherData = json_decode($response, true);

        if ($weatherData === null) {
            Log::error('Failed to decode weather data');
            return null;
        }

        return $weatherData;
    }

}
