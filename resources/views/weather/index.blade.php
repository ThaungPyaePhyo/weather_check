<x-app-layout title="Weather Lookup">
    <div class="bg-white rounded-lg shadow-lg p-8 text-center">
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
    </div>
</x-app-layout>
