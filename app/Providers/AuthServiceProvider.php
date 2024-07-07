<?php

namespace App\Providers;

use App\Models\Sushi\Guest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
//        Gate::policy(Guest::class, \App\Policies\Sushi\Guest::class);
    }
}
