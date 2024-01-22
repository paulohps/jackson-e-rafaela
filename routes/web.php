<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Site\Home::class)->name('site.home');
Route::get('/covite/{invite:uuid}', \App\Livewire\Site\Invite::class)->name('site.invite');
Route::get('/lista-de-presentes', \App\Livewire\Site\Invite::class)->name('site.gift-list');
Route::get('/hospedagem', \App\Livewire\Site\Invite::class)->name('site.accommodation');
Route::get('/presenca/{invite:uuid}', \App\Livewire\Site\Presence::class)->name('site.presence');
