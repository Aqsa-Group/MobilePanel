<?php
namespace App\Livewire\Admin2;

use App\Models\RegisterDevice as RegisterDeviceModel;
use Livewire\Component;

class DeviceList extends Component
{
    public function render()
    {
        $query = RegisterDeviceModel::query()->with('submittedBy');

        if (request()->filled('imei')) {
            $query->where('imei', 'like', '%' . request('imei') . '%');
        }

        if (request()->filled('category')) {
            $query->where('category', request('category'));
        }

        if (request()->filled('model')) {
            $query->where('model', request('model'));
        }

        if (request()->filled('status')) {
            $query->where('status', request('status'));
        }

        $devices = $query->latest()->paginate(10)->withQueryString();

        return view('livewire.admin2.pages.device-list', compact('devices'))
            ->layout('livewire.admin2.layouts.app');
    }
}
