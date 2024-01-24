<?php

namespace App\Livewire\Site;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class Accommodation extends Component
{
    public function render(): View
    {
        $accommodations = \App\Models\Accommodation::where('active', true)->get();

        return view('livewire.site.accommodation', compact('accommodations'))->layout('components.layouts.site');
    }
}
