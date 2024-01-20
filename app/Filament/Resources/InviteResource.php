<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InviteResource\Pages;
use App\Models\Invite;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

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
                            ))
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
        return $table
            ->columns([
                TextColumn::make('family_name')
                    ->label('Nome da Família')
                    ->searchable()
                    ->sortable(),
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
                    ->label('Crianças Confirmadas')
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
