<?php

namespace App\Livewire\Site;

use App\Models\Invite;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Support\HtmlString;
use Illuminate\Contracts\View\View;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\{Placeholder, Repeater, Toggle};

/**
 * @property Form $form
 */
class Presence extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Invite $invite;

    public function mount(): void
    {
        session(['presence' => $this->invite->uuid]);

        $this->form->fill([
            'people' => $this->invite->people
        ]);
    }

    public function render(): View
    {
        return view('livewire.site.presence')->layout('components.layouts.site');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Repeater::make('people')
                ->hiddenLabel()
                ->required()
                ->addable(false)
                ->deletable(false)
                ->orderColumn(false)
                ->columns(2)
                ->schema([
                    Placeholder::make('')
                        ->extraAttributes(['class' => 'text-left text-black'])
                        ->content(static fn(Get $get) => new HtmlString("Nome: <span class='font-bold'>{$get('name')}</span>")),
                    Toggle::make('confirmed')
                        ->label('Confirmado?')
                        ->default(false)
                ])
        ])->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->invite->update([
            'people' => $data['people'],
            'answered_at' => $this->invite->answered_at ?? now()
        ]);

        Notification::make()
            ->title('Presença confirmada com sucesso!')
            ->success()
            ->send();

        $this->redirect(route('site.home'));
    }
}
