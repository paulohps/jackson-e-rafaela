<div>
    <section class="relative bg-cover bg-gradient-to-b from-primary-200 to-primary-300 h-[80vh]">
        <div class="h-full" style="background-image: url({{ vite_asset('images/home-details.png') }})">
            <div class="container flex flex-col lg:flex-row items-center h-full">
                <img class="mb-8 lg:mb-0 lg:w-1/2 rounded-xl -rotate-6 drop-shadow-xl" src="{{ vite_asset('images/home-jackson-rafaela.png') }}" alt="Jackson e Rafaela andando de mãos dadas">

                <header class="text-center lg:text-right lg:w-1/2 text-primary-900">
                    <h1 class="font-cinzel text-6xl font-medium">Jackson & <br> Rafaela</h1>
                    <p class="font-montserrat font-light text-3xl mt-6">
                        <x-heroicon-o-calendar class="w-7 h-7 inline-block mr-1 -mt-2"/>
                        06/07/2024
                    </p>
                </header>
            </div>
        </div>

        <x-countdown start="07/06/2024 18:00:00" class="flex-col justify-center items-center space-y-2 w-full absolute -bottom-10 font-montserrat font-light"/>
    </section>
</div>
