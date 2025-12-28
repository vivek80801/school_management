<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School-@yield('title', 'App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack("css")
</head>
<body>
    <x-navbar />
    <div class="container">
        @yield("content")
    </div>
    @stack("javascript")
</body>
</html>
