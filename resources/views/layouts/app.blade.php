<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if(View::hasSection('title')) @yield('title') @else PDD @endif</title>
    <livewire:styles />
    <link rel="stylesheet" href="{{ asset('assets/css/spectre.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spectre-exp.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pdd.css') }}">
    <script src="{{ asset('assets/js/alpine.min.js') }}" defer></script>
</head>
<body>
    
    <livewire:components.header />
    
    <div class="off-canvas">

        <div id="sidebar" class="off-canvas-sidebar">
            <livewire:components.sidebar />
        </div>

        <a class="off-canvas-overlay" href="#close"></a>

        <div class="off-canvas-content">
            {{ $slot }}
        </div>

    </div>

    <livewire:scripts />
</body>
</html>