<?php

namespace App\Livewire\Site;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class Home extends Component
{
    public function render(): View
    {
        return view('livewire.site.home')->layout('components.layouts.site');
    }
}
