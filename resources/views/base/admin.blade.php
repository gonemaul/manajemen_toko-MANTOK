<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MANTOK - @yield('title')</title>

    @php
        $files = File::glob(public_path('build/assets/*.css'));
    @endphp

    @foreach ($files as $file)
        <link rel="stylesheet" href="{{ asset('build/assets/' . basename($file)) }}" />
    @endforeach

    @vite('resources/css/app.css')

    @stack('style')
</head>

<body>
    @yield('content')
    @stack('script')
    @vite('resources/js/app.js')
</body>

</html>
