<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'site',
        'location_url',
        'active',
        'phone',
        'whatsapp',
        'prices',
        'vacancies',
        'people'
    ];

    protected $casts = [
        'prices' => 'collection',
        'active' => 'boolean',
        'whatsapp' => 'boolean',
        'vacancies' => 'integer',
        'people' => 'collection'
    ];

    public function phone(): Attribute
    {
        return Attribute::make(
            static fn($value) => mask($value, '(##) #####-####'),
            static fn($value) => preg_replace('/\D/', '', $value)
        );
    }

    public function freeVacancies(): Attribute
    {
        return Attribute::make(
            fn($value) => $this->vacancies !== null ? $this->vacancies - count($this->people) : null,
            static fn($value) => $value
        );
    }
}
