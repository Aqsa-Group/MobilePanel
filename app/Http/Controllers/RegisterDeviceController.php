<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterDevice;

class RegisterDeviceController extends Controller
{
    public function index(Request $request)
    {
        $query = RegisterDevice::query();

        if ($request->filled('imei')) {
            $query->where('imei', 'like', '%' . $request->imei . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('model')) {
            $query->where('model', $request->model);
        }

        $devices = $query->latest()->paginate(10)->withQueryString();

        // 🔥 گرفتن لیست یکتا
        $categories = RegisterDevice::select('category')->distinct()->pluck('category');
        $models     = RegisterDevice::select('model')->distinct()->pluck('model');

        return view('livewire.admin2.component.device-list', compact(
            'devices',
            'categories',
            'models'
        ));
    }
}
