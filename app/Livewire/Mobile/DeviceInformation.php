<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class DeviceInformation extends Component
{
    public function render()
    {
        return view('livewire.mobile.device-information',[  'devices' => \App\Models\Device::latest()->get()]);
    }
}
