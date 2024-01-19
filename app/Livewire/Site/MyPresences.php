<?php

namespace App\Livewire\Site;

use Livewire\Component;
use Filament\Forms\Form;
use Filament\Support\RawJs;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\{Repeater, TextInput};

/**
 * @property Form $form
 */
class MyPresences extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function render(): View
    {
        return view('livewire.site.my-presences')->layout('components.layouts.site');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('presences')
                    ->label('Minhas presenças')
                    ->columns(2)
                    ->addActionLabel('Adicionar pessoa')
                    ->orderColumn(false)
                    ->deletable(fn() => count($this->data['presences'] ?? []) > 1)
                    ->addable(fn() => !$this->hasEmptyPresence())
                    ->live(debounce: 500)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->live()
                            ->required(),
                        TextInput::make('phone')
                            ->label('Whatsapp / Telefone')
                            ->required()
                            ->validationAttribute('whatsapp / telefone')
                            ->mask(RawJs::make(
                                <<<'JS'
                                    $input.length >= 14 ? '(99) 99999-9999' : '(99) 9999-9999'
                                JS
                            ))
                    ])
            ])
            ->statePath('data');
    }

    public function updatedData(): void
    {
        $this->save();
    }

    public function save(): void
    {
        $data = $this->form->getState();

        DB::transaction(static fn() => collect($data['presences'])->each(static function ($presence) {
            $presence['phone'] = preg_replace('/\D/', '', $presence['phone']);


        }));
    }

    private function hasEmptyPresence(): bool
    {
        return collect($this->data['presences'] ?? [])
            ->contains(fn($presence) => empty($presence['name']) || empty($presence['phone']));
    }
}
