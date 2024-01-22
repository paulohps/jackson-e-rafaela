@section('title', 'Confirmar Presença')

<form class="container py-8 space-y-8 w-full max-w-[95%] lg:max-w-[800px]" wire:submit.prevent="save">
    <header class="flex items-center space-x-4">
        <h1 class="font-bold text-xl">Confirmação de presença</h1>
        <hr class="border-primary-900/40 flex-grow">
    </header>

    {{ $this->form }}

    <div class="flex justify-center">
        <button class="btn btn-lg px-10 btn-primary">
            <x-heroicon-o-check class="w-6 h-6 mr-2" />
            Confirmar
        </button>
    </div>
</form>
