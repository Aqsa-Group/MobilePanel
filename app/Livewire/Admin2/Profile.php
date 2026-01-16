<?php
namespace App\Livewire\Admin2;
use Livewire\Component;
class Profile extends Component
{
    public function render()
    {
        return view('livewire.admin2.pages.profile')->layout('livewire.admin2.layouts.app');
    }
}
