<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use App\Models\Accommodation;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use App\Filament\Resources\AccommodationResource\Pages;

class AccommodationResource extends Resource
{
    protected static ?string $model = Accommodation::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $pluralModelLabel = 'Hospedagens';

    protected static ?string $modelLabel = 'Hospedagem';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(['default' => 1, 'lg' => 2])->schema([
                Section::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nome')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('site')
                        ->url()
                        ->maxLength(255),
                    TextInput::make('vacancies')
                        ->label('Vagas')
                        ->nullable()
                        ->type('number')
                        ->minValue(1)
                        ->live(),
                    Forms\Components\TextInput::make('location_url')
                        ->label('Link de localização do maps')
                        ->maxLength(500)
                        ->required(),
                    TextInput::make('phone')
                        ->label('Telefone')
                        ->required()
                        ->mask(RawJs::make(
                            <<<'JS'
                                    $input.length >= 14 ? '(99) 99999-9999' : '(99) 9999-9999'
                                JS
                        )),
                    Forms\Components\Split::make([
                        Forms\Components\Toggle::make('whatsapp')
                            ->label('Telefone tem whatsapp?')
                            ->required()
                            ->default(true),
                        Forms\Components\Toggle::make('active')
                            ->label('Ativo?')
                            ->required()
                            ->default(true)
                    ])
                ])->columnSpan(1),
                Section::make()->schema([
                    Forms\Components\Repeater::make('people')
                        ->label('Pessoas')
                        ->addable()
                        ->deletable()
                        ->hint(static fn(Forms\Get $get) => $get('vacancies') > 0 ? "Você pode adicionar até {$get('vacancies')} pessoas" : 'Informe o campo vagas para liberar este campo.')
                        ->disabled(static fn(Forms\Get $get) => $get('vacancies') <= 0)
                        ->maxItems(static fn(Forms\Get $get) => (int)($get('vacancies') ?? 0))
                        ->defaultItems(static fn(Forms\Get $get) => (int)($get('vacancies') ?? 0))
                        ->addActionLabel('Adicionar pessoa')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('Nome')
                                ->required()
                                ->maxLength(255)
                        ])
                ])->columnSpan(1)
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Nome')
                ->searchable(),
            Tables\Columns\TextColumn::make('site')
                ->description('Clique para copiar o link do site')
                ->formatStateUsing(static fn() => 'Link do site')
                ->copyable(),
            Tables\Columns\TextColumn::make('location_url')
                ->description('Clique para copiar o link da localização')
                ->label('Localização')
                ->formatStateUsing(static fn() => 'Link da localização')
                ->copyable(),
            Tables\Columns\TextColumn::make('vacancies')
                ->label('Vagas')
                ->searchable(),
            Tables\Columns\TextColumn::make('free_vacancies')
                ->label('Vagas livres')
                ->searchable(),
            Tables\Columns\IconColumn::make('active')
                ->label('Ativo?')
                ->boolean(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Criado em')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true)
        ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                ])
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccommodations::route('/'),
            'create' => Pages\CreateAccommodation::route('/create'),
            'edit' => Pages\EditAccommodation::route('/{record}/edit'),
        ];
    }
}
