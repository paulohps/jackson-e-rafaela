<?php

namespace App\Filament\Resources\Sushi;

use App\Filament\Exports\GuestExporter;
use App\Filament\Resources\Sushi\GuestResource\Pages;
use App\Models\Sushi\Guest;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Convidado';
    protected static ?string $pluralModelLabel = 'Convidados';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
     return false;
    }

    public static function canDelete(Model $record): bool
    {
     return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('family_name')
                    ->label('Nome da Família')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('Telefone')
                    ->searchable(),
                IconColumn::make('confirmed')
                    ->label('Confirmado?')
                    ->boolean(),
                IconColumn::make('children')
                    ->label('Criança?')
                    ->boolean(),
                TextColumn::make('answered_at')
                    ->formatStateUsing(static fn(Guest $record) => $record->answered_at?->format('d/m/Y H:i:s') ?? '---')
                    ->label('Respondido em')
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()
                        ->exporter(GuestExporter::class)
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGuests::route('/')
        ];
    }
}
