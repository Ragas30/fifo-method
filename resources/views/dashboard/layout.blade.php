<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/LOGO.png') }}">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <div class="flex h-screen">
        @include('dashboard.sidebar')
        <main class="flex-1 p-4 overflow-y-scroll">
            @yield('content')
        </main>
    </div>
</body>

</html>
