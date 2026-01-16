<?php
namespace App\Livewire\Admin2;
use Livewire\Component;
class DeviceList extends Component
{
    public function render()
    {
        return view('livewire.admin2.pages.device-list')->layout('livewire.admin2.layouts.app');
    }
}
