<?php

namespace App\Filament\Resources\InviteResource\Widgets;

use App\Models\Invite;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Illuminate\Support\Facades\DB;

class Overview extends BaseWidget
{
    protected function getStats(): array
    {
        $invites = Invite::all(['people']);

        $total = $invites->map(fn($invite) => $invite->people->count())->sum();
        $confirmed = $invites->map(fn($invite) => $invite->people->filter(fn($person) => $person['confirmed'])->count())->sum();
        $totalChildren = $invites->map(fn($invite) => $invite->people->filter(fn($person) => $person['children'])->count())->sum();
        $confirmedChildren = $invites->map(fn($invite) => $invite->people->filter(fn($person) => $person['children'] && $person['confirmed'])->count())->sum();

        return [
            Stat::make('Total', $total),
            Stat::make('Confirmados', $confirmed),
            Stat::make('Não confirmados', $total - $confirmed),
            Stat::make('Adultos', $total - $totalChildren),
            Stat::make('Adultos confirmados', $confirmed - $confirmedChildren),
            Stat::make('Adultos não confirmados', ($total - $totalChildren) - ($confirmed - $confirmedChildren)),
            Stat::make('Crianças', $totalChildren),
            Stat::make('Crianças confirmadas', $confirmedChildren),
            Stat::make('Crianças não confirmadas', $totalChildren - $confirmedChildren),
        ];
    }
}
