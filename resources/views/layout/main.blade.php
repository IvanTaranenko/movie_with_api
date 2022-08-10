<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Movie App</title>
</head>
<body class="font-sans bg-gray-900 text-white">
@include('layout.nav')
@yield('content')

@livewireScripts
</body>
</html>
