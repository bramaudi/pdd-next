<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if(View::hasSection('title')) @yield('title') @else {{ $desa->nama }} @endif</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('public/icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('public/icons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('public/icons/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="msapplication-config" content="{{ asset('public/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">

    <livewire:styles />

    <!-- Tailwind Base CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Alpine JS -->
    <script src="{{ asset('vendor/alpine.min.js') }}" defer></script>

</head>

<body x-data="{ sidebar: false }">

    <header class="header">
        <button @click="sidebar = !sidebar" class="w-8 h-8 mr-3 border-2 border-transparent focus:outline-none">
            <svg x-show="sidebar" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            <svg x-show="!sidebar" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
        </button>
        <a href="{{ route('index') }}" class="font-bold text-xl">
            PDD
        </a>

        <livewire:header />
    </header>

    <aside :class="{ 'block': sidebar }" @click.away="sidebar = false" class="sidebar">
        <livewire:sidebar />
    </aside>

    <main class="main">
        @yield('content')
    </main>

    <livewire:scripts />

</body>
</html>