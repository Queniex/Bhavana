<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <style>
            *{
                border: red 1px solid;
            }
        </style>
    </head>

    <body class="antialiased">
        <div id="app" class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
            {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

                <div class="mt-8 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="mt-3">
                            <a href="/login" class="bg-red-200">
                                <p class="bg-red-300">Login</p>
                            </a>
                        </div>
                        <div class="p-6">
                            <landingpage></landingpage>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="js/app.js"></script>
    </body>
</html>
