<?php
namespace App\Livewire\Admin2;
use Livewire\Component;
class RegisterDevice extends Component
{
    public function render()
    {
        return view('livewire.admin2.pages.register-device')->layout('livewire.admin2.layouts.app');
    }
}
