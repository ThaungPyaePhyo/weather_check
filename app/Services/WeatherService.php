<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class WeatherService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('app.weather_api_key');
    }

    public function getWeatherByCity($city)
    {
        try {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric',
            ]);

            $data = $response->json();

            if ($data['cod'] === 200) {
                $city = $data['name'];
                $temperature = $data['main']['temp'];
                $weatherDescription = $data['weather'][0]['description'];
                $timestamp = $data['dt'];
                $timezoneOffset = $data['timezone'];

                $dateTime = (new \DateTime())->setTimestamp($timestamp);
                $dateTime->setTimezone(new \DateTimeZone('UTC'));
                $dateTime->modify("+" . ($timezoneOffset / 3600) . " hours");
                $localTime = $dateTime->format('d/m/Y H:i:s');

                return [
                    'city' => $city,
                    'temperature' => $temperature,
                    'weather' => $weatherDescription,
                    'timestamp' => $localTime,
                ];
            } else {
                switch ($data['cod']) {
                    case 404:
                        return ['error' => 'City not found. Please check the city name.'];
                    case 401:
                        return ['error' => 'There was an issue retrieving weather data. Please try again later.'];
                    default:
                        return ['error' => 'Could not retrieve weather data. Please try again later.'];
                }
            }
        } catch (RequestException $e) {
            return ['error' => 'Network error: ' . $e->getMessage()];
        }
    }
}
