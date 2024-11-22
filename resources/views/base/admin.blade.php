<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - MANTOK</title>

    @php
        $files = File::glob(public_path('build/assets/*.css'));
    @endphp

    @foreach ($files as $file)
        {{-- <link rel="stylesheet" href="{{ asset('build/assets/' . basename($file)) }}" /> --}}
    @endforeach

    @vite('resources/sass/app.scss')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @stack('style')
</head>

<body>
    @yield('content')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.js"></script>
    @stack('script')
</body>

</html>
