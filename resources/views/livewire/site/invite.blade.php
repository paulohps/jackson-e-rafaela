<div x-data="{open: @entangle('showModal')}" class="flex flex-col justify-center items-center py-4 min-h-screen w-screen bg-[#FFFAF4]">
    <div class="flex flex-col space-y-8 justify-center items-center h-full w-full max-w-[95%] lg:max-w-[800px] container mx-auto text-center border-2 py-4 lg:py-8 border-dashed border-black">
        <img class="h-28 lg:h-32 inline-block" src="{{ vite_asset('images/brand.png') }}" alt="Logo Jackson e Rafaela">

        <p class="font-montserrat font-light text-xl lg:text-2xl">COM A BENÇÃO DE SEUS PAIS</p>

        <div class="flex flex-col space-y-2">
            <p class="font-cinzel text-6xl lg:text-7xl font-light">JACKSON</p>
            <p class="font-cinzel text-6xl lg:text-7xl font-light">&</p>
            <p class="font-cinzel text-6xl lg:text-7xl font-light">RAFAELA</p>
        </div>
        <p class="font-montserrat text-xl lg:text-2xl font-light">CONVIDAM PARA A CERIMÔNIA <br> DO SEU CASAMENTO</p>
        <p class="font-montserrat text-xl lg:text-2xl font-light">06 DE JULHO DE 2024 <br> ÀS 18 HORAS</p>
        <p class="font-montserrat text-lg font-light">AVENIDA BRASIL <br> CIDADE CAMPO NOVO DO PARECIS</p>
        <img class="h-12 lg:h-20" src="{{ vite_asset('images/invite-flowers.png') }}" alt="Detalhe com flores">

        <div class="w-[96%] border-t-2 pt-4 lg:pt-8 border-black border-dashed">
            <button @click.prevent="open = true" class="">Confirmar Presença</button>
        </div>
    </div>

    <div
        x-show="open"
        class="motion-safe:ease-out duration-150 flex justify-center items-center fixed top-0 left-0 h-full w-full bg-black/50"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div
            x-show="open"
            @click.outside="open = false"
            class="motion-safe:ease-out duration-100 flex flex-col space-y-2 bg-white p-4 rounded w-[95%] lg:w-2/3 max-h-[90%] overflow-y-auto lg:max-w-[700px]"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
        >
            <div class="flex items-center space-x-4">
                <hr class="flex-grow">
                <p>Confirmar presença</p>
                <hr class="flex-grow">
            </div>

            <form wire:submit="create">
                {{ $this->form }}

                <hr>

                <div class="flex justify-between">
                    <button @click.prevent="open = false">Cancelar</button>
                    <button>Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>
