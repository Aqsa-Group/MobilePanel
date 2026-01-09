<?php

namespace App\Livewire\Website;

use Livewire\Component;

class Services extends Component
{
    public function render()
    {
        return view('livewire.website.services') ->layout('livewire.website.layouts.app');
    }
}
