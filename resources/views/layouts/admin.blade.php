<!doctype html>
<html lang="fr">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        @vite('resources/css/app.css')
        @yield('css')
    </head>
    <body class="flex flex-col h-screen bg-armadillo-50">
        @include('partials/header_admin')

        @include('partials/sidebar_admin')

        @yield('content')

        <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-30 hidden"></div>
        @yield('js')
        @yield('js-1')
        <script src="https://flowbite.com/docs/flowbite.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    </body>
</html>
