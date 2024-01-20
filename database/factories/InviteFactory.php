<?php

namespace Database\Factories;

use App\Models\Invite;
use Illuminate\Database\Eloquent\Factories\Factory;

class InviteFactory extends Factory
{
    protected $model = Invite::class;

    public function definition(): array
    {
        return [
            'family_name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'people' => $this->faker->words()
        ];
    }
}
