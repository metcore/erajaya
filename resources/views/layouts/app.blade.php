<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap-4.6.0-dist/css/bootstrap-grid.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap-4.6.0-dist/css/bootstrap-reboot.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap-4.6.0-dist/css/bootstrap.min.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/jquery.js') }}" ></script>
        <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="{{ asset('bootstrap-4.6.0-dist/js/bootstrap.min.js') }}" ></script>
        <script src="{{ asset('bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js') }}" ></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

                            <br>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <main>
                            {{ $slot }}
                        </main>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
