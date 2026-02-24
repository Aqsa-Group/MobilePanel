<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    // ✅ پیام‌های فارسی
    protected $messages = [

        'store_name.required' => 'لطفاً نام فروشگاه را وارد کنید',
        'owner_name.required' => 'لطفاً نام مالک را وارد کنید',
        'address.required' => 'لطفاً آدرس فروشگاه را وارد کنید',
        'phone.required' => 'لطفاً شماره تماس را وارد کنید',
        'tazkira_id.required' => 'لطفاً شماره تذکره را وارد کنید',
        'license_number.required' => 'لطفاً شماره جواز را وارد کنید',

        'owner_photo.image' => 'فایل عکس مالک باید تصویر معتبر باشد',
        'owner_photo.max' => 'حجم عکس مالک نباید بیشتر از ۲ مگابایت باشد',

        'license_photo.image' => 'فایل عکس جواز باید تصویر معتبر باشد',
        'license_photo.max' => 'حجم عکس جواز نباید بیشتر از ۲ مگابایت باشد',
    ];

 public function index(Request $request)
{
    $query = Store::query();

    if ($request->search) {
        $query->where(function($q) use ($request) {
            $q->where('owner_name', 'like', '%'.$request->search.'%')
              ->orWhere('store_name', 'like', '%'.$request->search.'%')
              ->orWhere('phone', 'like', '%'.$request->search.'%');
        });
    }

    // ✅ اصلاح فیلتر وضعیت
    if ($request->filled('filterStatus')) {
        $query->where('status', $request->filterStatus);
    }

    $stores = $query->latest()->paginate(4)->withQueryString();

    return view('livewire.admin2.component.store', compact('stores'));
}
    public function store(Request $request)
    {
        $request->validate(
            [
                'store_name' => 'required',
                'owner_name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'tazkira_id' => 'required',
                'license_number' => 'required',
                'owner_photo' => 'nullable|image|max:2048',
                'license_photo' => 'nullable|image|max:2048',
            ],
            $this->messages
        );

        $data = $request->only([
            'store_name',
            'owner_name',
            'address',
            'phone',
            'tazkira_id',
            'license_number',
            'status'
        ]);

        if ($request->hasFile('owner_photo')) {
            $data['owner_photo'] = $request->file('owner_photo')->store('owners', 'public');
        }

        if ($request->hasFile('license_photo')) {
            $data['license_photo'] = $request->file('license_photo')->store('licenses', 'public');
        }

        Store::create($data);

        return redirect()->route('admin2.store')->with('success', 'فروشگاه ثبت شد');
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);
        $stores = Store::latest()->paginate(10);

        return view('livewire.admin2.component.store', compact('stores', 'store'));
    }

    public function update(Request $request, $id)
    {
        $store = Store::findOrFail($id);

        $request->validate(
            [
                'store_name' => 'required',
                'owner_name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'tazkira_id' => 'required',
                'license_number' => 'required',
                'owner_photo' => 'nullable|image|max:2048',
                'license_photo' => 'nullable|image|max:2048',
            ],
            $this->messages
        );

        $data = $request->only([
            'store_name',
            'owner_name',
            'address',
            'phone',
            'tazkira_id',
            'license_number',
            'status'
        ]);

        if ($request->hasFile('owner_photo')) {
            $data['owner_photo'] = $request->file('owner_photo')->store('owners', 'public');
        }

        if ($request->hasFile('license_photo')) {
            $data['license_photo'] = $request->file('license_photo')->store('licenses', 'public');
        }

        $store->update($data);

        return redirect()->route('admin2.store')->with('success', 'ویرایش انجام شد');
    }

    public function destroy($id)
    {
        Store::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'حذف شد');
    }
}