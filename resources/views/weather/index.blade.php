<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-300 to-blue-600 text-gray-800">

<div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full text-center">
    <h1 class="text-2xl font-bold text-blue-700 mb-6">Weather Lookup</h1>

    <form action="{{ route('weather.index') }}" method="POST" class="space-y-4">
        @csrf
        <label for="city" class="block text-gray-700 text-left font-semibold">Enter City Name:</label>
        <input
            type="text"
            name="city"
            id="city"
            value="{{ request('city') }}"
            required
            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
        >
        <button
            type="submit"
            class="w-full bg-blue-700 text-white font-semibold py-3 rounded-md hover:bg-blue-800 transition duration-200"
        >
            Get Weather
        </button>
    </form>

    @if ($weatherData)
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
    @endif
</div>

</body>
</html>
