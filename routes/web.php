<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Site\Home::class)->name('site.home');
Route::get('/covite', \App\Livewire\Site\Invite::class)->name('site.invite');
Route::get('/lista-de-presentes', \App\Livewire\Site\Invite::class)->name('site.gift-list');
Route::get('/hospedagem', \App\Livewire\Site\Invite::class)->name('site.accommodation');
Route::get('/minhas-presencas', \App\Livewire\Site\MyPresences::class)->name('site.my-presences');
