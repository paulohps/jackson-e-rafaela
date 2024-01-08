<?php

use Illuminate\Support\Facades\Route;

Route::get('convite', \App\Livewire\Site\Invite::class)->name('site.invite');
