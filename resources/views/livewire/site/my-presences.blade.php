@section('title', 'Minhas Presenças')

<form class="container py-8 space-y-8" wire:submit.prevent="save">
    <header class="flex items-center space-x-4">
        <h1 class="font-bold text-xl">Confirmação de presença</h1>
        <hr class="border-primary-900/40 flex-grow">
    </header>

    <div class="border border-primary-900/40 p-4 rounded-lg">
        <p class="font-medium">Informações importantes sobre a confirmação de presença:</p>

        <ul class="list-disc list-inside">
            <li class="list-item">Confirme a presença apenas das pessoas que irão com você.</li>
            <li class="list-item">Preencha os campos <span class="font-bold">Nome</span> e <span class="font-bold">Whatsapp / Telefone</span> para liberar o botão de adicionar mais pessoas.</li>
            <li class="list-item">Para cancelar uma presença é só remove-la nessa tela.</li>
        </ul>
    </div>

    {{ $this->form }}
</form>
