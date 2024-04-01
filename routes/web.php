<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Site\Home::class)->name('site.home');
Route::get('/covite/{invite:uuid}', \App\Livewire\Site\Invite::class)->name('site.invite');
Route::get('/hospedagem', \App\Livewire\Site\Accommodation::class)->name('site.accommodation');
Route::get('/lista-de-presentes', \App\Livewire\Site\Gift::class)->name('site.gifts');
Route::get('/presenca/{invite:uuid}', \App\Livewire\Site\Presence::class)->name('site.presence');
