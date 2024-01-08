<?php

namespace App\Livewire\Site;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class Invite extends Component implements HasForms
{
    use InteractsWithForms;

    public bool $showModal = false;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('')
            ])
            ->statePath('data');
    }

    public function render(): View
    {
        return view('livewire.site.invite')->layout('layouts.site');
    }
}
