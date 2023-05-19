<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div id="app">
        <nav class="bg-white shadow">
            <div class="container mx-auto px-4 py-2">
                <a href="/" class="font-bold text-lg">Contact Form</a>
            </div>
        </nav>

        <main class="container mx-auto px-4 py-8">
            @yield('content')
        </main>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
