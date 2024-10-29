<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather.index'); // View to show the form
    }

    public function fetchWeather(Request $request)
    {
        // Validate user input
        $request->validate([
            'city' => 'required|string|max:255',
        ]);

        $city = $request->input('city');
        $apiKey = env('OPENWEATHER_API_KEY');

        // Fetch weather data from OpenWeatherMap API
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric' // Temperature in Celsius
        ]);

        if ($response->successful()) {
            $data = $response->json();

            // Pass data to the view
            return view('weather.result', [
                'city' => $data['name'],
                'temperature' => $data['main']['temp'],
                'description' => $data['weather'][0]['description'],
                'timestamp' => now()->format('d/m/Y H:i A'),
            ]);
        } else {
            // If the API call failed or the city was invalid
            return back()->withErrors(['city' => 'Could not retrieve weather data. Please check the city name and try again.']);
        }
    }
}
