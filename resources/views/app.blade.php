<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ 'Laravel' }}</title>

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <!-- Command Section -->
    @yield('command-section')

    <!-- Table Section -->
    @yield('table-section')
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
