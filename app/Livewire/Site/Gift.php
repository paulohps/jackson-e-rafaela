<?php

namespace App\Livewire\Site;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class Gift extends Component
{
    public function render(): View
    {
        return view('livewire.site.gift')->layout('components.layouts.site');
    }
}
