<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME', "BIMS") }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @auth
        @if (Auth::user()->hasRole('campus'))
            @include('campus._ui.navbar')
        @endif

    @else
        @include('guest._ui.navbar')
    @endauth
    <div class="py-2">
        @yield('content')
    </div>
</body>

</html>