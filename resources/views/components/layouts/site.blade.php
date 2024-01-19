<!doctype html>
<html lang="{{ str(app()->getLocale())->replace('_', '-') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jackson e Rafaela - @yield('title', 'Site de casamento')</title>
    <link rel="icon" href="{{ vite_asset('images/brand-primary.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;700;900&family=Montserrat:wght@100;300;500;700;900&display=swap" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/assets/css/site/index.css')
</head>
<body class="antialiased pt-16 bg-primary-50 font-montserrat font-light text-primary-900">
    <nav class="fixed top-0 left-0 h-16 w-full bg-gradient-to-b from-primary-300 to-primary-200">
        <div x-data="{open: false}" class="container h-full flex justify-between items-center text-primary-950">
            <a href="{{ route('site.home') }}">
                <img class="h-12" src="{{ vite_asset('images/brand-primary.png') }}" alt="Logo Jackson e Rafaela">
            </a>

            <button @click.prevent="open = !open" class="p-1 rounded border border-primary-800/80 hover:bg-primary-800 hover:text-white transition lg:hidden text-primary-800/80">
                <x-heroicon-c-bars-3 class="w-8 h-8"/>
            </button>

            <div :class="[open ? 'flex' : 'hidden lg:flex']" class="flex-col absolute top-[102%] left-0 bg-primary-200 w-full divide-y divide-primary-800/30 shadow-md lg:flex-row lg:justify-end lg:relative lg:top-0 lg:bg-transparent lg:shadow-none lg:h-full">
                <x-layouts.site.navbar-link href="{{ route('site.home') }}">
                    <x-heroicon-o-home class="w-4 h-4 mr-1"/>
                    Início
                </x-layouts.site.navbar-link>
                <x-layouts.site.navbar-link wire:navigate href="{{ route('site.invite') }}">
                    <x-heroicon-o-ticket class="w-4 h-4 mr-1"/>
                    Convite
                </x-layouts.site.navbar-link>
                <x-layouts.site.navbar-link wire:navigate href="{{ route('site.my-presences') }}">
                    <x-heroicon-o-check class="w-4 h-4 mr-1"/>
                    Confirmar presença
                </x-layouts.site.navbar-link>
{{--                <x-layouts.site.navbar-link wire:navigate href="{{ route('site.gift-list') }}">--}}
{{--                    <x-heroicon-o-gift class="w-4 h-4 mr-1"/>--}}
{{--                    Lista de presentes--}}
{{--                </x-layouts.site.navbar-link>--}}
{{--                <x-layouts.site.navbar-link wire:navigate href="{{ route('site.accommodation') }}">--}}
{{--                    <x-heroicon-o-building-office class="w-4 h-4 mr-1"/>--}}
{{--                    Hospedagem--}}
{{--                </x-layouts.site.navbar-link>--}}
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>


    @filamentScripts
    @vite('resources/assets/js/site/index.js')
</body>
</html>
