<div class="max-w-full mx-auto p-4 space-y-6">
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 sm:p-6">
        <div class="mb-4 flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <h3 class="font-semibold text-gray-700 text-right">گزارشات بلاک دستگاه‌ها</h3>
            <div class="w-full lg:w-80 relative">
                <input wire:model.live.debounce.400ms="search" type="text" class="input-field text-xs w-full !pl-10" placeholder="جستجو بر اساس IMEI، مالک یا متن گزارش">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700 pointer-events-none">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"></circle>
                        <path d="M20 20L17 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                    </svg>
                </span>
            </div>
        </div>

        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-xs">
                <thead class="bg-blue-800 text-white">
                    <tr>
                        <th class="p-2 text-center">آیدی</th>
                        <th class="p-2 text-center">IMEI</th>
                        <th class="p-2 text-center">نام مالک</th>
                        <th class="p-2 text-center">شماره مالک</th>
                        <th class="p-2 text-center">دلیل بلاک</th>
                        <th class="p-2 text-center">زمان</th>
                        <th class="p-2 text-center">جزئیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($alerts as $row)
                        @php
                            $payload = (array) ($row->payload ?? []);
                            $createdAtLabel = $row->created_at ? \Morilog\Jalali\Jalalian::fromDateTime($row->created_at)->format('Y/m/d') . ' ' . $row->created_at->format('h:i A') : '-';
                        @endphp
                        <tr class="border-b">
                            <td class="p-2 text-center">{{ (($alerts->currentPage() - 1) * $alerts->perPage()) + $loop->iteration }}</td>
                            <td class="p-2 text-center" dir="ltr">{{ $payload['imei'] ?? '-' }}</td>
                            <td class="p-2 text-center">{{ $payload['owner_full_name'] ?? '-' }}</td>
                            <td class="p-2 text-center" dir="ltr">{{ $payload['owner_phone'] ?? '-' }}</td>
                            <td class="p-2 text-center">{{ $payload['reason'] ?? '-' }}</td>
                            <td class="p-2 text-center">{{ $createdAtLabel }}</td>
                            <td class="p-2 text-center">
                                <button type="button" wire:click="openDetail({{ $row->id }})" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-xs">
                                    مشاهده
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500">گزارش بلاکی ثبت نشده است.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden space-y-3">
            @forelse($alerts as $row)
                @php
                    $payload = (array) ($row->payload ?? []);
                    $createdAtLabel = $row->created_at ? \Morilog\Jalali\Jalalian::fromDateTime($row->created_at)->format('Y/m/d') . ' ' . $row->created_at->format('h:i A') : '-';
                @endphp
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-3">
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div class="text-center">
                            <p class="text-gray-500">آیدی</p>
                            <p class="font-semibold">{{ (($alerts->currentPage() - 1) * $alerts->perPage()) + $loop->iteration }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-gray-500">IMEI</p>
                            <p class="font-semibold" dir="ltr">{{ $payload['imei'] ?? '-' }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-gray-500">مالک</p>
                            <p class="font-semibold">{{ $payload['owner_full_name'] ?? '-' }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-gray-500">شماره مالک</p>
                            <p class="font-semibold" dir="ltr">{{ $payload['owner_phone'] ?? '-' }}</p>
                        </div>
                        <div class="text-center col-span-2">
                            <p class="text-gray-500">دلیل بلاک</p>
                            <p class="font-semibold">{{ $payload['reason'] ?? '-' }}</p>
                        </div>
                        <div class="text-center col-span-2">
                            <p class="text-gray-500">زمان</p>
                            <p class="font-semibold">{{ $createdAtLabel }}</p>
                        </div>
                    </div>
                    <button type="button" wire:click="openDetail({{ $row->id }})" class="mt-3 w-full rounded-lg bg-slate-100 py-2 text-sm font-semibold">
                        مشاهده جزئیات
                    </button>
                </div>
            @empty
                <div class="rounded-xl border border-gray-200 bg-white p-4 text-center text-gray-500">گزارش بلاکی ثبت نشده است.</div>
            @endforelse
        </div>

        <div class="mt-4">{{ $alerts->links() }}</div>
    </div>

    @if($showDetailModal && $selectedPayload)
        @php
            $ownerPhoto = trim((string) ($selectedPayload['owner_photo'] ?? ''));
            $deviceImage = trim((string) ($selectedPayload['device_image'] ?? ''));
            $ownerPhotoUrl = $ownerPhoto !== '' ? asset('storage/' . ltrim($ownerPhoto, '/')) : null;
            $deviceImageUrl = $deviceImage !== '' ? asset('storage/' . ltrim($deviceImage, '/')) : null;
        @endphp
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="w-full max-w-3xl rounded-2xl bg-white shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-red-600 to-red-500 px-4 py-3 text-white flex items-center justify-between">
                    <h4 class="font-bold">{{ $selectedTitle !== '' ? $selectedTitle : 'جزئیات گزارش بلاک' }}</h4>
                    <button type="button" wire:click="closeDetailModal" class="h-8 w-8 rounded-full bg-white/20 hover:bg-white/30">✕</button>
                </div>
                <div class="p-4 sm:p-5 grid grid-cols-1 md:grid-cols-2 gap-3 text-sm max-h-[70vh] overflow-y-auto">
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">عکس مالک</p>
                        @if($ownerPhotoUrl)
                            <img src="{{ $ownerPhotoUrl }}" alt="owner photo" class="w-full h-36 rounded-lg object-cover border">
                        @else
                            <div class="h-36 rounded-lg border border-dashed border-gray-300 text-xs text-gray-400 flex items-center justify-center">ندارد</div>
                        @endif
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">عکس دستگاه</p>
                        @if($deviceImageUrl)
                            <img src="{{ $deviceImageUrl }}" alt="device photo" class="w-full h-36 rounded-lg object-cover border">
                        @else
                            <div class="h-36 rounded-lg border border-dashed border-gray-300 text-xs text-gray-400 flex items-center justify-center">ندارد</div>
                        @endif
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">IMEI</p>
                        <p class="font-semibold" dir="ltr">{{ $selectedPayload['imei'] ?? '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">تاریخ اعلان</p>
                        <p class="font-semibold">{{ $selectedCreatedAt }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">نام مالک</p>
                        <p class="font-semibold">{{ $selectedPayload['owner_full_name'] ?? '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">شماره مالک</p>
                        <p class="font-semibold" dir="ltr">{{ $selectedPayload['owner_phone'] ?? '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">مدل دستگاه</p>
                        <p class="font-semibold">{{ $selectedPayload['device_model'] ?? '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">نوع حادثه</p>
                        <p class="font-semibold">{{ ($selectedPayload['incident_type'] ?? '') === 'stolen' ? 'سرقت' : (($selectedPayload['incident_type'] ?? '') === 'lost' ? 'مفقودی' : '-') }}</p>
                    </div>
                    <div class="rounded-lg border p-3 md:col-span-2">
                        <p class="text-xs text-gray-500 mb-1">محل حادثه</p>
                        <p class="font-semibold">{{ $selectedPayload['incident_location'] ?? '-' }}</p>
                    </div>
                    <div class="rounded-lg border border-red-200 bg-red-50 p-3 md:col-span-2">
                        <p class="text-xs text-red-600 mb-1">دلیل بلاک</p>
                        <p class="font-semibold text-red-700">{{ $selectedPayload['reason'] ?? '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3 md:col-span-2">
                        <p class="text-xs text-gray-500 mb-1">پیام کامل</p>
                        <p class="font-semibold">{{ $selectedMessage }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
