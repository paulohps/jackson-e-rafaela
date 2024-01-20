<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invite extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_name',
        'phone',
        'people',
    ];

    protected $casts = [
        'people' => 'collection'
    ];

    public function phone(): Attribute
    {
        return Attribute::make(
            static fn($value) => mask($value, '(##) #####-####'),
            static fn($value) => preg_replace('/[^0-9]/', '', $value)
        );
    }

    public function amountOfConfirmed(): Attribute
    {
        return Attribute::make(fn() => $this->people->filter(fn($person) => $person['confirmed'])->count());
    }

    public function amountOfNotConfirmed(): Attribute
    {
        return Attribute::make(fn() => $this->people->filter(fn($person) => !$person['confirmed'])->count());
    }

    public function total(): Attribute
    {
        return Attribute::make(fn() => $this->people->count());
    }

    public function amountOfChildren(): Attribute
    {
        return Attribute::make(fn() => $this->people->filter(fn($person) => $person['children'])->count());
    }

    public function amountOfConfirmedChildren(): Attribute
    {
        return Attribute::make(fn() => $this->people->filter(fn($person) => $person['children'] && $person['confirmed'])->count());
    }
}
