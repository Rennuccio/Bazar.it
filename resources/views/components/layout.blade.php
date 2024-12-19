<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Bazar</title>
</head>

<body>
    <x-navbar />
    <!-- CONTENUTO VISTE -->
    {{$slot}}
    <!-- FINE CONTENUTO VISTE -->
    <x-footer />
    <!-- Script JS -->
    <x-scripts />
</body>

<x-fixedBtn />
</html>
