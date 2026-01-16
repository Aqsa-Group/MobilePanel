<?php
namespace App\Livewire\Admin2;
use Livewire\Component;
class Store extends Component
{
    public function render()
    {
        return view('livewire.admin2.pages.store')->layout('livewire.admin2.layouts.app');
    }
}
