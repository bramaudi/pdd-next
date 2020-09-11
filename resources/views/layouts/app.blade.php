<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if(View::hasSection('title')) @yield('title') @else PDD @endif</title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <livewire:styles />
    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
</head>
<body>
    <div id="layout">
        <livewire:components.header />
        <livewire:components.sidebar />
        <main>{{ $slot }}</main>
    </div>
    <livewire:scripts />
</body>
</html>