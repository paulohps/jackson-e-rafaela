<?php

namespace App\Filament\Resources;

use App\Models\Invite;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\InviteResource\Pages;
use Filament\Tables\Actions\{BulkActionGroup, DeleteAction, DeleteBulkAction, EditAction};
use Filament\Forms\Components\{DateTimePicker, Grid, Repeater, Section, TextInput, Toggle};

class InviteResource extends Resource
{
    protected static ?string $model = Invite::class;

    protected static ?string $slug = 'invites';

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationLabel = 'Convites';

    protected static ?string $modelLabel = 'Convite';
    protected static ?string $pluralModelLabel = 'Convites';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 1, 'lg' => 2])
                ->schema([
                    Section::make()->schema([
                        TextInput::make('family_name')
                            ->label('Nome da Família')
                            ->required(),
                        TextInput::make('phone')
                            ->label('Telefone')
                            ->required()
                            ->mask(RawJs::make(
                                <<<'JS'
                                    $input.length >= 14 ? '(99) 99999-9999' : '(99) 9999-9999'
                                JS
                            )),
                        DateTimePicker::make('answered_at')
                            ->label('Respondido em')
                            ->displayFormat('d/m/Y H:i:s')
                            ->maxDate(now())
                    ])->columnSpan(1),
                    Section::make()->schema([
                        Repeater::make('people')
                            ->label('Pessoas')
                            ->required()
                            ->minItems(1)
                            ->columns(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nome')
                                    ->required()
                                    ->columnSpan(2),
                                Toggle::make('confirmed')
                                    ->label('Confirmado?')
                                    ->default(false),
                                Toggle::make('children')
                                    ->label('Criança?')
                                    ->default(false)
                            ])
                    ])->columnSpan(1)
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('family_name')
                ->label('Nome da Família')
                ->searchable()
                ->sortable(),
            TextColumn::make('link')
                ->description('Clique para copiar o link de convite')
                ->state(static fn(Invite $record) => route('site.invite', $record))
                ->formatStateUsing(static fn() => 'Link do convite')
                ->copyable(),
            TextColumn::make('phone')
                ->label('Telefone')
                ->searchable(),
            TextColumn::make('total')
                ->label('Convidados'),
            TextColumn::make('amount_of_confirmed')
                ->label('Confirmados'),
            TextColumn::make('amount_of_not_confirmed')
                ->label('Não Confirmados'),
            TextColumn::make('amount_of_children')
                ->label('Crianças'),
            TextColumn::make('amount_of_confirmed_children')
                ->label('Crianças Confirmadas'),
            TextColumn::make('answered_at')
                ->formatStateUsing(static fn(Invite $record) => $record->answered_at?->format('d/m/Y H:i:s') ?? '---')
                ->label('Respondido em')
                ->sortable()
        ])
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvites::route('/'),
            'create' => Pages\CreateInvite::route('/create'),
            'edit' => Pages\EditInvite::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['family_name'];
    }
}
