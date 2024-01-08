<!doctype html>
<html lang="{{ str(app()->getLocale())->replace('_', '-') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convite Casamento Jackson e Rafaela</title>
    <link rel="icon" href="{{ vite_asset('images/brand.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;700;900&family=Montserrat:wght@100;300;500;700;900&display=swap" rel="stylesheet">

    @vite('resources/assets/css/site/index.css')
</head>
<body>
    {{ $slot }}

    @vite('resources/assets/js/site/index.js')
</body>
</html>
