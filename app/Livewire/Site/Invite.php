<?php

namespace App\Livewire\Site;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Support\RawJs;
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
                Repeater::make('presences')
                    ->label('Pessoas')
                    ->columns(2)
                    ->addActionLabel('Adicionar pessoa')
                    ->orderColumn(false)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required(),
                        TextInput::make('phone')
                            ->label('Whatsapp')
                            ->mask(RawJs::make(
                                <<<'JS'
                                    $input.length >= 14 ? '(99) 99999-9999' : '(99) 9999-9999'
                                JS
                            ))
                    ])
            ])
            ->statePath('data');
    }

    public function render(): View
    {
        return view('livewire.site.invite')->layout('layouts.site');
    }
}
