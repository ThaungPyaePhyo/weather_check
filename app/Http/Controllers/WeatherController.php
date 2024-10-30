<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        // Fetch data if city parameter exists in the request
        $city = $request->input('city');
        $weatherData = null;

        if ($city) {
            $apiKey = env('OPENWEATHER_API_KEY');
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric' // Temperature in Celsius
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $weatherData = [
                    'city' => $data['name'],
                    'temperature' => $data['main']['temp'],
                    'description' => $data['weather'][0]['description'],
                    'timestamp' => now()->format('d/m/Y H:i A'),
                ];
            } else {
                // Pass an error message if the API call fails
                $weatherData = ['error' => 'Could not retrieve weather data. Please check the city name and try again.'];
            }
        }

        return view('weather.index', compact('weatherData'));
    }
}
