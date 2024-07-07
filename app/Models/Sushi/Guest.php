<?php

namespace App\Models\Sushi;

use Illuminate\Support\Carbon;
use Sushi\Sushi;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $family_name
 * @property string $phone
 * @property Carbon $answered_at
 * @property string $name
 * @property bool $children
 * @property bool $confirmed
 */
class Guest extends Model
{
    use Sushi;

    protected $casts = [
        'children' => 'boolean',
        'confirmed' => 'boolean',
        'answered_at' => 'datetime'
    ];

    public function getRows(): array
    {
        return \App\Models\Invite::all()
            ->flatMap(static fn(\App\Models\Invite $invite) => $invite->people->map(static fn(array $person, int $index) => [
                'id' => "$invite->id$index",
                'family_name' => $invite->family_name,
                'phone' => $invite->phone,
                'answered_at' => $invite->answered_at,
                'name' => $person['name'],
                'confirmed' => $person['confirmed'],
                'children' => $person['children']
            ]))
            ->toArray();
    }
}
