<?php

namespace App\Livewire\Site;

use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

/**
 * @property Form $form
 */
class Invite extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public \App\Models\Invite $invite;

    public function mount(): void
    {
        session(['invite' => $this->invite->uuid]);
    }

    public function render(): View
    {
        return view('livewire.site.invite')->layout('components.layouts.site');
    }
}
