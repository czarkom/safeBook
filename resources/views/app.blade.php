<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" sizes="32x32" href="images/favicon.ico">
    <title>Safebook</title>
</head>
<body class="antialiased bg-gray-100">
    @yield('content')
</body>
</html>


