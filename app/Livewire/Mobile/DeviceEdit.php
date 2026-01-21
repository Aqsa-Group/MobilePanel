<?php

namespace App\Livewire\Mobile;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public Device $device;

    public $status;
    public $model;
    public $memory;
    public $color;
    public $image;
    public $buy_price;
    public $sell_price;
    public $stock;
    public $imei;
    public $warranty;

    // گرفتن id از QueryString
    protected $queryString = ['id'];
    public $id;

    public function mount()
    {
        abort_unless($this->id, 404);

        $this->device = Device::findOrFail($this->id);

        $this->fill([
            'status'     => $this->device->status,
            'model'      => $this->device->model,
            'memory'     => $this->device->memory,
            'color'      => $this->device->color,
            'buy_price'  => $this->device->buy_price,
            'sell_price' => $this->device->sell_price,
            'stock'      => $this->device->stock,
            'imei'       => $this->device->imei,
            'warranty'   => $this->device->warranty,
        ]);
    }

    protected function rules()
    {
        return [
            'status'     => 'required|in:new,used,damaged',
            'model'      => 'required|string|max:255',
            'memory'     => 'nullable|string|max:100',
            'color'      => 'nullable|string|max:100',
            'image'      => 'nullable|image|max:2048',
            'buy_price'  => 'required|numeric|min:0',
            'sell_price' => 'required|numeric|min:0',
            'stock'      => 'required|integer|min:0',
            'imei'       => 'nullable|string|max:20',
            'warranty'   => 'nullable|string|max:255',
        ];
    }

    public function update()
    {
        $this->validate();

        if ($this->image) {
            if ($this->device->image) {
                Storage::disk('public')->delete($this->device->image);
            }

            $this->device->image = $this->image->store('devices', 'public');
        }

        $this->device->update([
            'status'     => $this->status,
            'model'      => $this->model,
            'memory'     => $this->memory,
            'color'      => $this->color,
            'buy_price'  => $this->buy_price,
            'sell_price' => $this->sell_price,
            'stock'      => $this->stock,
            'imei'       => $this->imei,
            'warranty'   => $this->warranty,
        ]);

        session()->flash('success', 'اطلاعات با موفقیت ویرایش شد ✅');
    }

    public function render()
    {
        return view('livewire.mobile.device-edit');
    }
}
