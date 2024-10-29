<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
</head>
<body>
<h1>Weather Lookup</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('weather.fetch') }}" method="POST">
    @csrf
    <label for="city">Enter City Name:</label>
    <input type="text" name="city" id="city" required>
    <button type="submit">Get Weather</button>
</form>
</body>
</html>
