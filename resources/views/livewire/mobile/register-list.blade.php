<div class="max-w-full mx-auto p-4 space-y-6">
    @if (session()->has('success'))
        <div
            x-data="{ open: true }"
            x-init="setTimeout(() => open = false, 3000)"
            x-show="open"
            x-transition.opacity
            class="fixed inset-0 z-[80] flex items-center justify-center p-4"
        >
            <div class="absolute inset-0 bg-black/30"></div>
            <div class="relative w-full max-w-md rounded-2xl border border-emerald-200 bg-white px-5 py-6 text-center shadow-2xl">
                <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                        <path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h4 class="text-base font-bold text-emerald-700">عملیات موفق</h4>
                <p class="mt-2 text-sm text-gray-700">{{ session('success') }}</p>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div
            x-data="{ open: true }"
            x-init="setTimeout(() => open = false, 3000)"
            x-show="open"
            x-transition.opacity
            class="fixed inset-0 z-[80] flex items-center justify-center p-4"
        >
            <div class="absolute inset-0 bg-black/30"></div>
            <div class="relative w-full max-w-md rounded-2xl border border-red-200 bg-white px-5 py-6 text-center shadow-2xl">
                <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-red-100 text-red-700">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none">
                        <path d="M12 8v5m0 4h.01M10.3 3.9L2.9 17a2 2 0 001.74 3h14.72a2 2 0 001.74-3L13.7 3.9a2 2 0 00-3.4 0z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h4 class="text-base font-bold text-red-700">خطا در عملیات</h4>
                <p class="mt-2 text-sm text-gray-700">{{ session('error') }}</p>
            </div>
        </div>
    @endif
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 sm:p-6">
        <div class="mb-4 space-y-3">
            <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                <h3 class="font-semibold text-gray-700 text-right">لیست دستگاه‌ها:</h3>
                <div class="w-full lg:w-80 relative">
                    <input wire:model.live.debounce.500ms="imeiSearch" type="text" class="input-field text-xs w-full !pl-10" placeholder="جستجو بر اساس IMEI">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700 pointer-events-none">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"></circle>
                            <path d="M20 20L17 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-2">
                <button wire:click="$set('statusFilter','approved')" class="w-full px-3 py-2 rounded-lg text-sm {{ $statusFilter === 'approved' ? 'bg-blue-800 text-white' : 'bg-gray-100' }}">تایید شده</button>
                <button wire:click="$set('statusFilter','blocked')" class="w-full px-3 py-2 rounded-lg text-sm {{ $statusFilter === 'blocked' ? 'bg-blue-800 text-white' : 'bg-gray-100' }}">بلاک شده</button>
                <button wire:click="$set('statusFilter','pending')" class="w-full px-3 py-2 rounded-lg text-sm {{ $statusFilter === 'pending' ? 'bg-blue-800 text-white' : 'bg-gray-100' }}">در انتظار</button>
            </div>
        </div>
        <div class="hidden md:block overflow-x-hidden">
            <table class="w-full table-fixed text-[11px]">
                <thead class="bg-blue-800 text-white">
                    <tr class="text-right border-b">
                        <th class="p-2 text-[10px]">آیدی</th>
                        <th class="p-2 text-[10px]">نام فروشگاه</th>
                        <th class="p-2 text-[10px]">ثبت کننده</th>
                        <th class="p-2 text-[10px]">عکس دستگاه</th>
                        <th class="p-2 text-[10px]">عکس کارتن دستگاه</th>
                        <th class="p-2 text-[10px]">نام دستگاه</th>
                        <th class="p-2 text-[10px]">رنگ</th>
                        <th class="p-2 text-[10px]">کتگوری</th>
                        <th class="p-2 text-[10px]">شماره IMEI</th>
                        <th class="p-2 text-[10px]">نام مالک</th>
                        <th class="p-2 text-[10px]">شماره تماس</th>
                        <th class="p-2 text-[10px]">آدرس مالک</th>
                        <th class="p-2 text-[10px]">آیدی تذکره</th>
                        <th class="p-2 text-[10px]">عکس تذکره</th>
                        <th class="p-2 text-[10px]">عکس مالک</th>
                        <th class="p-2 text-[10px]">وضعیت</th>
                        <th class="p-2 text-[10px]">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registers as $row)
                        <tr wire:key="desktop-register-row-{{ $row->id }}-{{ $row->status }}" class="border-b align-top">
                            <td class="p-2 text-[9px] font-bold break-words whitespace-normal">{{ (($registers->currentPage() - 1) * $registers->perPage()) + $loop->iteration }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $row->shop_name ?? '-' }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $row->submittedBy?->name ?? ('کاربر #' . $row->submitted_by_user_id) }}</td>
                            <td class="p-2 text-[9px] text-center">
                                @if($row->device_image)
                                    <img src="{{ asset('storage/' . $row->device_image) }}" class="w-8 h-8 rounded-full  mx-auto">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="p-2 text-[9px] text-center">
                                @if($row->carton_image)
                                    <img src="{{ asset('storage/' . $row->carton_image) }}" class="w-8 h-8 rounded-full mx-auto">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $row->model }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $row->color }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $row->category }}</td>
                            <td class="p-2 text-[9px] break-all whitespace-normal" dir="ltr">{{ $row->imei }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $row->customer_name }}</td>
                            <td class="p-2 text-[9px] break-all whitespace-normal" dir="ltr">{{ $row->customer_phone }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $row->customer_address }}</td>
                            <td class="p-2 text-[9px] break-all whitespace-normal" dir="ltr">{{ $row->customer_tazkira_id }}</td>
                            <td class="p-2 text-[9px] text-center">
                                @if($row->tazkira_image)
                                    <img src="{{ asset('storage/' . $row->tazkira_image) }}" class="w-8 h-8 rounded-full mx-auto">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="p-2 text-[9px] text-center">
                                @if($row->customer_image)
                                    <img src="{{ asset('storage/' . $row->customer_image) }}" class="w-8 h-8 rounded-full mx-auto">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="p-2 text-[9px]">
                                @if($row->status === 'approved') <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 text-[10px] font-semibold">تایید</span> @endif
                                @if($row->status === 'blocked') <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-red-100 text-red-800 text-[10px] font-semibold">رد</span> @endif
                                @if($row->status === 'pending') <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-blue-100 text-blue-800 text-[10px] font-semibold">در انتظار</span> @endif
                            </td>
                            <td class="p-2 text-[9px]">
                                <button type="button" wire:click.prevent="openRegisterDetails({{ $row->id }})" class="px-2 py-1 rounded bg-gray-100 text-[10px]">جزئیات</button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="17" class="py-4 text-center text-gray-500">موردی یافت نشد</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="md:hidden space-y-3">
            @forelse($registers as $row)
                <div wire:key="mobile-register-card-{{ $row->id }}-{{ $row->status }}" class="rounded-xl border border-gray-200 bg-white shadow-sm p-3">
                    <div class="grid grid-cols-2 gap-x-3 gap-y-2 text-xs">
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">آیدی</p>
                            <p class="font-semibold break-words text-center">{{ (($registers->currentPage() - 1) * $registers->perPage()) + $loop->iteration }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">وضعیت</p>
                            <p class="font-semibold text-center">
                                @if($row->status === 'approved') <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 text-[10px] font-semibold">تایید</span> @endif
                                @if($row->status === 'blocked') <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-red-100 text-red-800 text-[10px] font-semibold">رد</span> @endif
                                @if($row->status === 'pending') <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-blue-100 text-blue-800 text-[10px] font-semibold">در انتظار</span> @endif
                            </p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">نام مالک</p>
                            <p class="font-semibold break-words text-center">{{ $row->customer_name }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">شماره تماس</p>
                            <p class="font-semibold break-all text-center" dir="ltr">{{ $row->customer_phone }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">نام دستگاه</p>
                            <p class="font-semibold break-words text-center">{{ $row->model }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">IMEI</p>
                            <p class="font-semibold break-all text-center" dir="ltr">{{ $row->imei }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">رنگ</p>
                            <p class="font-semibold break-words text-center">{{ $row->color }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">کتگوری</p>
                            <p class="font-semibold break-words text-center">{{ $row->category }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">آیدی تذکره</p>
                            <p class="font-semibold break-all text-center" dir="ltr">{{ $row->customer_tazkira_id }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">آدرس مالک</p>
                            <p class="font-semibold break-words text-center">{{ $row->customer_address }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500 mb-1 text-center">عکس مالک</p>
                            @if($row->customer_image)
                                <img src="{{ asset('storage/' . $row->customer_image) }}" class="w-8 h-8 rounded-full mx-auto">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500 mb-1 text-center">عکس دستگاه</p>
                            @if($row->device_image)
                                <img src="{{ asset('storage/' . $row->device_image) }}" class="w-8 h-8 rounded-full mx-auto">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500 mb-1 text-center">عکس تذکره</p>
                            @if($row->tazkira_image)
                                <img src="{{ asset('storage/' . $row->tazkira_image) }}" class="w-8 h-8 rounded-full mx-auto">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500 mb-1 text-center">عکس کارتن</p>
                            @if($row->carton_image)
                                <img src="{{ asset('storage/' . $row->carton_image) }}" class="w-8 h-8 rounded-full mx-auto">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </div>
                    </div>
                    <button type="button" wire:click.prevent="openRegisterDetails({{ $row->id }})" class="mt-3 w-full px-3 py-2 rounded-lg bg-gray-100 text-sm">جزئیات</button>
                </div>
            @empty
                <div class="rounded-xl border border-gray-200 bg-white p-4 text-center text-gray-500">موردی یافت نشد</div>
            @endforelse
        </div>
        <div class="mt-4">{{ $registers->links() }}</div>
    </div>
    @if($showDetailModal)
        @if($selectedRegister)
        @php
            $status = (string) ($selectedRegister->status ?? 'pending');
            $statusLabel = 'در انتظار';
            $headerGradient = 'from-amber-500 to-yellow-500';
            $chipClass = 'bg-amber-100 text-amber-800';
            $surfaceClass = 'border-amber-200';
            $cardClass = 'border-amber-100 bg-amber-50/40';
            if ($status === 'approved') {
                $statusLabel = 'تایید شده';
                $headerGradient = 'from-blue-700 to-blue-500';
                $chipClass = 'bg-blue-100 text-blue-800';
                $surfaceClass = 'border-blue-200';
                $cardClass = 'border-blue-100 bg-blue-50/40';
            } elseif ($status === 'blocked') {
                $statusLabel = 'بلاک شده';
                $headerGradient = 'from-red-600 to-red-500';
                $chipClass = 'bg-red-100 text-red-800';
                $surfaceClass = 'border-red-200';
                $cardClass = 'border-red-100 bg-red-50/40';
            }
        @endphp
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/45 p-3 sm:p-4">
            <div class="w-full max-w-5xl h-[400px] rounded-2xl border {{ $surfaceClass }} bg-white shadow-2xl overflow-hidden flex flex-col">
                <div class="bg-gradient-to-r {{ $headerGradient }} px-4 sm:px-5 py-4 text-white">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <h4 class="font-bold text-base sm:text-lg">جزئیات ثبت دستگاه</h4>
                            <p class="text-xs text-white/90 mt-1">IMEI: <span dir="ltr">{{ $selectedRegister->imei ?? '-' }}</span></p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold {{ $chipClass }}">{{ $statusLabel }}</span>
                            <button wire:click="closeDetailModal" class="h-8 w-8 rounded-full bg-white/20 hover:bg-white/30 text-white">✕</button>
                        </div>
                    </div>
                </div>
                <div class="p-4 sm:p-5 flex-1 overflow-y-auto space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 text-sm">
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">نام مالک</p>
                            <p class="font-semibold break-words">{{ $selectedRegister->customer_name ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">شماره تماس</p>
                            <p class="font-semibold break-all" dir="ltr">{{ $selectedRegister->customer_phone ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">آیدی تذکره</p>
                            <p class="font-semibold break-all" dir="ltr">{{ $selectedRegister->customer_tazkira_id ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">آدرس مالک</p>
                            <p class="font-semibold break-words">{{ $selectedRegister->customer_address ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">نام دستگاه</p>
                            <p class="font-semibold break-words">{{ $selectedRegister->model ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">رنگ</p>
                            <p class="font-semibold break-words">{{ $selectedRegister->color ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">کتگوری</p>
                            <p class="font-semibold break-words">{{ $selectedRegister->category ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">نام فروشگاه</p>
                            <p class="font-semibold break-words">{{ $selectedRegister->shop_name ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">یادداشت مدیریت</p>
                            <p class="font-semibold break-words">{{ $selectedRegister->review_note ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <div class="rounded-lg border {{ $cardClass }} p-2">
                            <p class="text-xs text-gray-500 mb-2 text-center">عکس مالک</p>
                            @if($selectedRegister->customer_image)
                                <img src="{{ asset('storage/' . $selectedRegister->customer_image) }}" class="w-full h-36 object-cover rounded-md border">
                            @else
                                <div class="h-36 rounded-md border border-dashed border-gray-300 text-gray-400 text-xs flex items-center justify-center">ندارد</div>
                            @endif
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-2">
                            <p class="text-xs text-gray-500 mb-2 text-center">عکس تذکره</p>
                            @if($selectedRegister->tazkira_image)
                                <img src="{{ asset('storage/' . $selectedRegister->tazkira_image) }}" class="w-full h-36 object-cover rounded-md border">
                            @else
                                <div class="h-36 rounded-md border border-dashed border-gray-300 text-gray-400 text-xs flex items-center justify-center">ندارد</div>
                            @endif
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-2">
                            <p class="text-xs text-gray-500 mb-2 text-center">عکس دستگاه</p>
                            @if($selectedRegister->device_image)
                                <img src="{{ asset('storage/' . $selectedRegister->device_image) }}" class="w-full h-36 object-cover rounded-md border">
                            @else
                                <div class="h-36 rounded-md border border-dashed border-gray-300 text-gray-400 text-xs flex items-center justify-center">ندارد</div>
                            @endif
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-2">
                            <p class="text-xs text-gray-500 mb-2 text-center">عکس کارتن</p>
                            @if($selectedRegister->carton_image)
                                <img src="{{ asset('storage/' . $selectedRegister->carton_image) }}" class="w-full h-36 object-cover rounded-md border">
                            @else
                                <div class="h-36 rounded-md border border-dashed border-gray-300 text-gray-400 text-xs flex items-center justify-center">ندارد</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/45 p-3 sm:p-4">
            <div class="w-full max-w-md h-[400px] rounded-2xl border border-gray-200 bg-white shadow-2xl overflow-hidden flex flex-col">
                <div class="px-5 py-4 border-b bg-gray-50 flex items-center justify-between">
                    <h4 class="font-bold text-gray-700">جزئیات ثبت دستگاه</h4>
                    <button wire:click="closeDetailModal" class="h-8 w-8 rounded-full bg-gray-200 hover:bg-gray-300 text-gray-700">✕</button>
                </div>
                <div class="flex-1 flex items-center justify-center p-6 text-center text-gray-600">
                    اطلاعات این مورد یافت نشد. دوباره امتحان کنید.
                </div>
            </div>
        </div>
        @endif
    @endif
</div>
