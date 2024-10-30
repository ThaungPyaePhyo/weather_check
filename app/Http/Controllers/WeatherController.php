<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index(Request $request)
    {
        $city = $request->input('city');

        if ($city) {
            $weatherData = $this->weatherService->getWeatherByCity($city);
            return view('weather.result', compact('weatherData'));
        }

        return view('weather.index');
    }
}
