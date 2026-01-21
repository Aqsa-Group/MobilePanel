<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class DeviceRepair extends Component
{
    public function render()
    {
        return view('livewire.mobile.device-repair')->layout('Mobile.layouts.app');
    }
}
