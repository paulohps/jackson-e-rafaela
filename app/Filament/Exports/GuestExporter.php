<?php

namespace App\Filament\Exports;

use App\Models\Sushi\Guest;
use Filament\Actions\Exports\Models\Export;
use Filament\Actions\Exports\{ExportColumn, Exporter};

class GuestExporter extends Exporter
{
    protected static ?string $model = Guest::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('family_name')
                ->label('Nome da família'),
            ExportColumn::make('phone')
                ->label('Telefone'),
            ExportColumn::make('answered_at')
                ->formatStateUsing(static fn(Guest $record) => $record->answered_at?->format('d/m/Y H:i:s'))
                ->label('Respondido em'),
            ExportColumn::make('name')
                ->label('Nome'),
            ExportColumn::make('confirmed')
                ->formatStateUsing(static fn(Guest $record) => $record->confirmed ? 'sim' : 'não')
                ->label('Confirmado?'),
            ExportColumn::make('children')
                ->formatStateUsing(static fn(Guest $record) => $record->children ? 'sim' : 'não')
                ->label('Criança?')
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Seu export de convites está completo e ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exportados.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' falhou ao exportar.';
        }

        return $body;
    }
}
