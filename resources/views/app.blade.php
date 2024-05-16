<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Plusoft - teste</title>

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
@if(Session::has('success'))
    <div class="alert alert-success" id="div-success-message">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger" id="div-error-message">
        {{ Session::get('error') }}
    </div>
@endif
<div class="container">
    <!-- Command Section -->
    @yield('command-section')

    <!-- Table Section -->
    @yield('table-section')
</div>

@include('library.add-book-div')

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
<script>
    setTimeout(function() {
        document.getElementById('div-success-message').style.display = 'none';
    }, {{ Session::get('timeout', 5000) }});

    setTimeout(function() {
        document.getElementById('div-error-message').style.display = 'none';
    }, {{ Session::get('timeout', 5000) }});
</script>
@stack('scripts')
</body>
</html>
