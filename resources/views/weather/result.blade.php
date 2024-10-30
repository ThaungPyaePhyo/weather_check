<x-app-layout title="Weather Result">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full text-center">
        <h1 class="text-2xl font-bold text-blue-700 mb-6">Weather Result</h1>

        <div class="mt-6">
            @if (isset($weatherData['error']))
                <div class="text-red-500 font-semibold mt-4">{{ $weatherData['error'] }}</div>
            @else
                <div class="bg-blue-50 p-4 rounded-lg shadow-md text-left space-y-2 mt-4">
                    <h2 class="text-xl font-semibold text-blue-800">Weather in {{ $weatherData['city'] }}</h2>
                    <p><strong>Temperature:</strong> {{ $weatherData['temperature'] }} °C</p>
                    <p><strong>Weather:</strong> {{ ucfirst($weatherData['description']) }}</p>
                    <p><strong>Date and Time:</strong> {{ $weatherData['timestamp'] }}</p>
                </div>
            @endif
        </div>

        <div class="mt-6">
            <a href="{{ route('weather.index') }}" class="text-blue-700 hover:underline">Search for another city</a>
        </div>
    </div>
</x-app-layout>
