<div class="flex flex-col justify-center items-center py-4 min-h-screen w-screen">
    <div class="flex flex-col space-y-8 justify-center items-center h-full w-full max-w-[95%] lg:max-w-[800px] container mx-auto text-center border-2 py-4 lg:py-8 border-dashed border-primary-900">
        <img class="h-28 lg:h-32 inline-block" src="{{ vite_asset('images/brand-primary.png') }}" alt="Logo Jackson e Rafaela">

        <p class="font-montserrat font-light text-xl lg:text-2xl">COM A BENÇÃO DE SEUS PAIS</p>

        <div class="flex flex-col space-y-2">
            <p class="font-cinzel text-6xl lg:text-7xl font-light">JACKSON</p>
            <p class="font-cinzel text-6xl lg:text-7xl font-light">&</p>
            <p class="font-cinzel text-6xl lg:text-7xl font-light">RAFAELA</p>
        </div>
        <p class="font-montserrat text-xl lg:text-2xl font-light">CONVIDAM PARA A CERIMÔNIA <br> DO SEU CASAMENTO</p>
        <p class="font-montserrat text-xl lg:text-2xl font-light">06 DE JULHO DE 2024 <br> ÀS 18 HORAS</p>
        <p class="font-montserrat text-lg font-light">AVENIDA BRASIL <br> CIDADE CAMPO NOVO DO PARECIS</p>
        <img class="h-12 lg:h-20 fill-primary-900" src="{{ vite_asset('images/invite-flowers.png') }}" alt="Detalhe com flores">

        <div class="w-[96%] border-t-2 pt-4 lg:pt-8 border-primary-900 border-dashed">
            <a href="{{ route('site.my-presences') }}">Confirmar Presença</a>
        </div>
    </div>
</div>
