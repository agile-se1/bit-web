<!DOCTYPE html>
<html>
    <head>
        @csrf
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        @vite('resources/css/app.css')
        @inertiaHead
    </head>
    <body>
        @inertia
        @vite('resources/js/app.js')
    </body>
</html>
