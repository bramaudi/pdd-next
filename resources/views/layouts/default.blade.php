<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    @if (View::hasSection('title')) @yield('title') @else {{ $desa->nama }}
        @endif
    </title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('icons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('icons/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="msapplication-config" content="{{ asset('icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">

    <livewire:styles />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>

    <div id="app">
        <livewire:header />

        <div class="off-canvas">

            <div id="sidebar" class="off-canvas-sidebar">
                <livewire:sidebar />
            </div>

            <a class="off-canvas-overlay" href="#"></a>

            <div class="off-canvas-content">
                @yield('content')
                <footer>&copy; 2020 Portal Desa Ditigal</footer>
            </div>

        </div>
    </div>


    <livewire:scripts />

</body>

</html>
