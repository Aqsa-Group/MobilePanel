<div class="max-w-7xl mx-auto p-4 space-y-5">
    @if (session()->has('success'))
        <div class="rounded-lg border border-blue-200 bg-blue-50 text-blue-700 px-4 py-3">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 sm:p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
            <h2 class="text-lg font-bold text-gray-700">تایید/رد ثبت دستگاه</h2>
            <div class="flex gap-2">
                <button wire:click="$set('statusFilter','pending')" class="px-3 py-1 rounded {{ $statusFilter === 'pending' ? 'bg-[#0B35CC] text-white' : 'bg-gray-100' }}">در انتظار</button>
                <button wire:click="$set('statusFilter','approved')" class="px-3 py-1 rounded {{ $statusFilter === 'approved' ? 'bg-[#0B35CC] text-white' : 'bg-gray-100' }}">تایید شده</button>
                <button wire:click="$set('statusFilter','blocked')" class="px-3 py-1 rounded {{ $statusFilter === 'blocked' ? 'bg-[#0B35CC] text-white' : 'bg-gray-100' }}">رد شده</button>
            </div>
        </div>

        <input wire:model.live.debounce.500ms="imeiSearch" type="text" class="w-full rounded-lg border px-3 py-2 mb-4" placeholder="جستجو بر اساس IMEI">

        <div class="overflow-x-auto">
            <table class="w-full text-sm whitespace-nowrap">
                <thead class="bg-[#0B35CC] text-white">
                    <tr class="text-right border-b">
                        <th class="py-2 px-2">آیدی</th>
                        <th class="py-2 px-2">نام فروشگاه</th>
                        <th class="py-2 px-2">ثبت کننده</th>
                        <th class="py-2 px-2">عکس دستگاه</th>
                        <th class="py-2 px-2">عکس کارتن دستگاه</th>
                        <th class="py-2 px-2">نام دستگاه</th>
                        <th class="py-2 px-2">رنگ</th>
                        <th class="py-2 px-2">کتگوری</th>
                        <th class="py-2 px-2">شماره IMEI</th>
                        <th class="py-2 px-2">نام مالک</th>
                        <th class="py-2 px-2">شماره تماس</th>
                        <th class="py-2 px-2">آدرس مالک</th>
                        <th class="py-2 px-2">آیدی تذکره</th>
                        <th class="py-2 px-2">عکس تذکره</th>
                        <th class="py-2 px-2">عکس مالک</th>
                        <th class="py-2 px-2">وضعیت</th>
                        <th class="py-2">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registers as $row)
                        <tr class="border-b">
                            <td class="py-2 px-2">{{ $row->id }}</td>
                            <td class="py-2 px-2">{{ $row->shop_name ?? '-' }}</td>
                            <td class="py-2 px-2">{{ $row->submittedBy?->name ?? ('کاربر #' . $row->submitted_by_user_id) }}</td>
                            <td class="py-2 px-2">
                                @if($row->device_image)
                                    <img src="{{ asset('storage/' . $row->device_image) }}" class="w-12 h-12 object-cover rounded border">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="py-2 px-2">
                                @if($row->carton_image)
                                    <img src="{{ asset('storage/' . $row->carton_image) }}" class="w-12 h-12 object-cover rounded border">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="py-2 px-2">{{ $row->model }}</td>
                            <td class="py-2 px-2">{{ $row->color }}</td>
                            <td class="py-2 px-2">{{ $row->category }}</td>
                            <td class="py-2 px-2">{{ $row->imei }}</td>
                            <td class="py-2 px-2">{{ $row->customer_name }}</td>
                            <td class="py-2 px-2">{{ $row->customer_phone }}</td>
                            <td class="py-2 px-2">{{ $row->customer_address }}</td>
                            <td class="py-2 px-2">{{ $row->customer_tazkira_id }}</td>
                            <td class="py-2 px-2">
                                @if($row->tazkira_image)
                                    <img src="{{ asset('storage/' . $row->tazkira_image) }}" class="w-12 h-12 object-cover rounded border">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="py-2 px-2">
                                @if($row->customer_image)
                                    <img src="{{ asset('storage/' . $row->customer_image) }}" class="w-12 h-12 object-cover rounded border">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="py-2 px-2">
                                @if($row->status === 'approved') <span class="text-green-600">تایید</span> @endif
                                @if($row->status === 'blocked') <span class="text-red-600">رد</span> @endif
                                @if($row->status === 'pending') <span class="text-amber-600">در انتظار</span> @endif
                            </td>
                            <td class="py-2">
                                <button wire:click="openRegisterDetails({{ $row->id }})" class="px-3 py-1 rounded bg-gray-100">جزئیات</button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="17" class="py-4 text-center text-gray-500">موردی یافت نشد</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $registers->links() }}</div>
    </div>

    @if($showDetailModal && $selectedRegister)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4">
            <div class="bg-white rounded-xl max-w-4xl w-full p-5">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="font-bold text-gray-700">بررسی ثبت دستگاه</h4>
                    <button wire:click="closeDetailModal" class="text-gray-500">✕</button>
                </div>

                <div class="flex gap-2 mb-4">
                    <button wire:click="setDetailStep(1)" class="px-3 py-1 rounded {{ $detailStep === 1 ? 'bg-[#0B35CC] text-white' : 'bg-gray-100' }}">مرحله 1</button>
                    <button wire:click="setDetailStep(2)" class="px-3 py-1 rounded {{ $detailStep === 2 ? 'bg-[#0B35CC] text-white' : 'bg-gray-100' }}">مرحله 2</button>
                    <button wire:click="setDetailStep(3)" class="px-3 py-1 rounded {{ $detailStep === 3 ? 'bg-[#0B35CC] text-white' : 'bg-gray-100' }}">مرحله 3</button>
                </div>

                @if($detailStep === 1)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm mb-4">
                        <div>مشتری: {{ $selectedRegister->customer_name }}</div>
                        <div>شماره: {{ $selectedRegister->customer_phone }}</div>
                        <div>آدرس: {{ $selectedRegister->customer_address }}</div>
                        <div>IMEI: {{ $selectedRegister->imei }}</div>
                        <div>فروشگاه: {{ $selectedRegister->shop_name }}</div>
                        <div>وضعیت فعلی: {{ $selectedRegister->status }}</div>
                    </div>
                @endif

                @if($detailStep === 2)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                        @if($selectedRegister->customer_image)
                            <img src="{{ asset('storage/' . $selectedRegister->customer_image) }}" class="w-full h-56 object-cover rounded-lg border">
                        @endif
                        @if($selectedRegister->tazkira_image)
                            <img src="{{ asset('storage/' . $selectedRegister->tazkira_image) }}" class="w-full h-56 object-cover rounded-lg border">
                        @endif
                    </div>
                @endif

                @if($detailStep === 3)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                        @if($selectedRegister->device_image)
                            <img src="{{ asset('storage/' . $selectedRegister->device_image) }}" class="w-full h-56 object-cover rounded-lg border">
                        @endif
                        @if($selectedRegister->carton_image)
                            <img src="{{ asset('storage/' . $selectedRegister->carton_image) }}" class="w-full h-56 object-cover rounded-lg border">
                        @endif
                    </div>
                @endif

                <textarea wire:model.defer="reviewNote" rows="3" class="w-full rounded-lg border px-3 py-2 mb-4" placeholder="یادداشت مدیریت (اختیاری/دلیل رد)"></textarea>

                <div class="flex gap-2">
                    <button wire:click="approve" class="px-4 py-2 rounded bg-green-600 text-white">تایید</button>
                    <button wire:click="reject" class="px-4 py-2 rounded bg-red-600 text-white">رد</button>
                </div>
            </div>
        </div>
    @endif

    @if($showToast && $toastMessage)
        <div x-data="{show:true}" x-init="setTimeout(() => {$wire.hideToast()}, 5000)" class="fixed bottom-4 left-4 z-50">
            <div class="bg-[#0B35CC] text-white px-4 py-3 rounded-lg shadow-lg text-sm">{{ $toastMessage }}</div>
        </div>
    @endif
</div>
