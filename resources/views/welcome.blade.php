<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Marvel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-gray-50">
        <div class="w-full h-20 py-4 bg-gradient-to-r from-red-600 to-gray-700">
            <div class="text-5xl font-extrabold text-center text-white">MARVEL</div>
        </div>

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div class="text-lg sm:text-3xl font-extrabold text-center text-black">EARTH'S SUPER HEROES</div>
            <div class="mt-2 mx-6 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($data as $item)
                        <div class="p-1 h-60 bg-white rounded-lg shadow-xl">
                            <img class="h-40 w-full rounded-t-lg" src="{{ $item['thumbnail']['path']. '.' .$item['thumbnail']['extension'] }}" alt="{{ $item['name'] }}">
                            <div class="px-2 mt-4 text-md sm:text-lg font-extrabold text-black truncate">{{ $item['name'] }}</div>
                            <div class="px-2 flex">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" class="w-5 h-5 text-gray-700"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-2 text-sm sm:text-md font-semibold  text-gray-700">{{ $item['comics']['available'] .' comics' }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
