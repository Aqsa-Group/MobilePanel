<?php

namespace App\Livewire\Website;

use Livewire\Component;

class Register extends Component
{
    public function render()
    {
        return view('livewire.website.register') ->layout('livewire.website.layouts.app');
    }
}
