@props(['start'])

<div data-start="{{ $start }}" class="countdown hidden {{ $attributes->get('class') }}">
    <p class="text-2xl font-montserrat font-light ">Faltam:</p>

    <div class="flex space-x-2 lg:space-x-4 justify-center">
        <div class="bg-primary-900 text-white px-3 lg:px-6 min-w-20 py-2 rounded-md text-center">
            <p class="countdown-days text-4xl">0</p>
            <p class="text-xs font-medium">dias</p>
        </div>
        <div class="bg-primary-900 text-white px-3 lg:px-6 min-w-20 py-2 rounded-md text-center">
            <p class="countdown-hours text-4xl">0</p>
            <p class="text-xs font-medium">horas</p>
        </div>
        <div class="bg-primary-900 text-white px-3 lg:px-6 min-w-20 py-2 rounded-md text-center">
            <p class="countdown-minutes text-4xl">0</p>
            <p class="text-xs font-medium">minutos</p>
        </div>
        <div class="bg-primary-900 text-white px-3 lg:px-6 min-w-20 py-2 rounded-md text-center">
            <p class="countdown-seconds text-4xl">0</p>
            <p class="text-xs font-medium">segundos</p>
        </div>
    </div>
</div>
