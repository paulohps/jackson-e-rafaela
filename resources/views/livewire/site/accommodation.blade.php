@section('title', 'Hospedagens')

<section class="container py-8 flex flex-col space-y-4 lg:space-y-8">
    <header class="flex items-center space-x-4">
        <h1 class="font-bold text-xl">Hospedagens</h1>
        <hr class="border-primary-900/40 flex-grow">
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        @forelse($accommodations as $accommodation)
            <article class="flex flex-col bg-primary-200/20 shadow-md space-y-4 p-4 border border-primary-900/30 rounded-lg">
                <iframe src="{{ $accommodation->location_url }}" class="aspect-video w-full rounded-lg border border-primary-900/30 shadow" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <header class="flex flex-col space-y-4 justify-between">
                    <div class="flex items-center space-x-4">
                        <h1 class="font-bold text-lg">{{ $accommodation->name }}</h1>
                        <hr class="border-primary-900/40 flex-grow">
                        @if($accommodation->vacancies !== null)
                            <p class="font-bold text-sm">Vagas: {{ $accommodation->free_vacancies }}</p>
                        @endif
                    </div>

                    @if($accommodation->site || $accommodation->phone)
                        <div class="flex flex-wrap lg:flex-nowrap justify-between items-center gap-4">
                            @if($accommodation->site)
                                <a target="_blank" href="{{ $accommodation->site }}" class="btn w-full btn-lg btn-primary">
                                    <x-heroicon-o-globe-alt class="w-4 h-4 mr-1"/>
                                    Site
                                </a>
                            @endif
                            @if($accommodation->phone)
                                <a href="tel:{{ $accommodation->phone }}" class="btn w-full btn-lg btn-primary">
                                    <x-heroicon-o-phone class="w-4 h-4 mr-1"/>
                                    Telefone
                                </a>

                                @if($accommodation->whatsapp)
                                    <a target="_blank" href="//wa.me/55{{ preg_replace('/\D/', '', $accommodation->phone) }}" class="btn w-full btn-lg btn-primary">
                                        <x-icons.whatsapp class="w-4 h-4 mr-1"/>
                                        WhatsApp
                                    </a>
                                @endif
                            @endif
                        </div>
                    @endif
                </header>
            </article>
        @empty
            <div class="flex flex-col items-center justify-center space-y-4">
                <x-heroicon-o-face-frown class="w-24 h-24 text-primary-900/70"/>
                <p class="text-primary-900/70">Nenhuma hospedagem cadastrada.</p>
            </div>
        @endforelse
    </div>
</section>
