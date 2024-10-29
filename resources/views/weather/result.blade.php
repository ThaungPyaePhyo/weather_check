<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Result</title>
</head>
<body>
<h1>Weather in {{ $city }}</h1>
<p>Temperature: {{ $temperature }} °C</p>
<p>Description: {{ ucfirst($description) }}</p>
<p>Date and Time: {{ $timestamp }}</p>

<a href="{{ route('weather.index') }}">Search another city</a>
</body>
</html>
