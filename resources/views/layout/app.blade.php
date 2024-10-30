<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Weather App' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/img.jpeg') }}" type="image/png">
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-300 to-blue-600 text-gray-800">
<div class="w-full max-w-md mx-auto">
    {{ $slot }}
</div>
</body>
</html>
