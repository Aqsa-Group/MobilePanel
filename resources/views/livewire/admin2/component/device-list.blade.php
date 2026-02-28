<div class="max-w-full mx-auto ">
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
    <div id="imageModal" class="fixed inset-0 hidden items-center justify-center bg-black/70 z-50" onclick="closeModal(event)">
        <div class="relative" onclick="event.stopPropagation()">
            <button onclick="closeModal()" class="absolute -top-10 right-0 text-white text-3xl font-bold">✕</button>
            <img id="modalImage" class="max-h-[80vh] max-w-[90vw] rounded-lg shadow-lg">
        </div>
    </div>
    <script>
        function showImage(src) {
            document.getElementById('modalImage').src = src;
            const modal = document.getElementById('imageModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }
        function closeModal(event = null) {
            if (!event || event.target.id === 'imageModal') {
                const modal = document.getElementById('imageModal');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
        window.addEventListener('admin-open-device-detail', function (event) {
            const id = event?.detail?.id;
            if (!id) return;
            if (window.Livewire && typeof window.Livewire.dispatch === 'function') {
                window.Livewire.dispatch('open-device-detail', { id: id });
            }
        });
    </script>
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 sm:p-6">
        <form method="GET" action="{{ route('admin2.device-list') }}" class="mb-4 space-y-3">
            <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
                <h3 class="font-semibold text-gray-700 text-right">لیست دستگاه‌ها:</h3>
                <div class="w-full lg:w-80 relative">
                    <input
                        type="text"
                        name="imei"
                        value="{{ request('imei') }}"
                        class="input-field text-xs w-full !pl-10"
                        placeholder="جستجو بر اساس IMEI">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700 pointer-events-none">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"></circle>
                            <path d="M20 20L17 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-2">
                <select name="category" class="input-field text-xs w-full">
                    <option value="">کتگوری</option>
                    <option value="موبایل" {{ request('category') == 'موبایل' ? 'selected' : '' }}>موبایل</option>
                    <option value="تبلت" {{ request('category') == 'تبلت' ? 'selected' : '' }}>تبلت</option>
                    <option value="لپتاب" {{ request('category') == 'لپتاب' ? 'selected' : '' }}>لپتاب</option>
                </select>
                <select name="model" class="input-field text-xs w-full">
                    <option value="">برند</option>
                    <option value="Apple" {{ request('model') == 'Apple' ? 'selected' : '' }}>اپل</option>
                    <option value="Samsung" {{ request('model') == 'Samsung' ? 'selected' : '' }}>سامسونگ</option>
                    <option value="Xiaomi" {{ request('model') == 'Xiaomi' ? 'selected' : '' }}>شیائومی</option>
                    <option value="Huawei" {{ request('model') == 'Huawei' ? 'selected' : '' }}>هواوی</option>
                </select>
                <select name="status" class="input-field text-xs w-full">
                    <option value="">وضعیت</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>در انتظار</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>تایید</option>
                    <option value="blocked" {{ request('status') == 'blocked' ? 'selected' : '' }}>بلاک</option>
                </select>
                <button type="submit" class="w-full px-3 py-2 rounded-lg text-sm bg-[#0B35CC] text-white">فیلتر اجرا</button>
                <a href="{{ route('admin2.device-list') }}" class="flex w-full items-center text-white justify-center px-3 py-2 rounded-lg text-sm bg-[#0B35CC]  text-center">فیلتر حذف</a>
            </div>
        </form>
        <div class="hidden md:block overflow-x-hidden">
            <table class="w-full table-fixed text-[11px]">
                <thead class="bg-[#0B35CC] text-white">
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
                    @forelse($devices as $device)
                        <tr class="border-b align-top">
                            <td class="p-2 text-[9px] font-bold break-words whitespace-normal">{{ $device->id }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $device->shop_name ?? '-' }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $device->submittedBy?->name ?? ('کاربر #' . ($device->submitted_by_user_id ?? '-')) }}</td>
                            <td class="p-2 text-[9px] text-center">
                                @if($device->device_image)
                                    <img src="{{ asset('storage/'.$device->device_image) }}" class="w-8 h-8 rounded-full object-cover mx-auto cursor-pointer" onclick="showImage(this.src)">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($device->model) }}&background=0B35CC&color=fff" class="w-8 h-8 rounded-full object-cover mx-auto">
                                @endif
                            </td>
                            <td class="p-2 text-[9px] text-center">
                                @if($device->carton_image)
                                    <img src="{{ asset('storage/'.$device->carton_image) }}" class="w-8 h-8 rounded-full object-cover mx-auto cursor-pointer" onclick="showImage(this.src)">
                                @else
                                    <img src="https://ui-avatars.com/api/?name=Box&background=cccccc&color=000" class="w-8 h-8 rounded-full object-cover mx-auto">
                                @endif
                            </td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $device->model ?? '-' }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $device->color ?? '-' }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $device->category ?? '-' }}</td>
                            <td class="p-2 text-[9px] break-all whitespace-normal" dir="ltr">{{ $device->imei ?? '-' }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $device->customer_name ?? '-' }}</td>
                            <td class="p-2 text-[9px] break-all whitespace-normal" dir="ltr">{{ $device->customer_phone ?? '-' }}</td>
                            <td class="p-2 text-[9px] break-words whitespace-normal">{{ $device->customer_address ?? '-' }}</td>
                            <td class="p-2 text-[9px] break-all whitespace-normal" dir="ltr">{{ $device->customer_tazkira_id ?? '-' }}</td>
                            <td class="p-2 text-[9px] text-center">
                                @if($device->tazkira_image)
                                    <img src="{{ asset('storage/'.$device->tazkira_image) }}" class="w-8 h-8 rounded-full object-cover mx-auto cursor-pointer" onclick="showImage(this.src)">
                                @else
                                    <img src="https://ui-avatars.com/api/?name=ID&background=999999&color=fff" class="w-8 h-8 rounded-full object-cover mx-auto">
                                @endif
                            </td>
                            <td class="p-2 text-[9px] text-center">
                                @if($device->customer_image)
                                    <img src="{{ asset('storage/'.$device->customer_image) }}" class="w-8 h-8 rounded-full object-cover mx-auto cursor-pointer" onclick="showImage(this.src)">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($device->customer_name) }}&background=random" class="w-8 h-8 rounded-full object-cover mx-auto">
                                @endif
                            </td>
                            <td class="p-2 text-[9px]">
                                @if($device->status === 'approved')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 text-[10px] font-semibold">تایید</span>
                                @elseif($device->status === 'blocked')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-red-100 text-red-800 text-[10px] font-semibold">بلاک</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-blue-100 text-blue-800 text-[10px] font-semibold">در انتظار</span>
                                @endif
                            </td>
                            <td class="p-2 text-[9px]">
                                <button type="button" wire:click.prevent="openDeviceDetails({{ $device->id }})" class="px-2 py-1 rounded bg-gray-100 text-[10px]">جزئیات</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="17" class="py-4 text-center text-gray-500">موردی یافت نشد</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="md:hidden space-y-3">
            @forelse($devices as $device)
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-3">
                    <div class="grid grid-cols-2 gap-x-3 gap-y-2 text-xs">
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">آیدی</p>
                            <p class="font-semibold break-words text-center">{{ $device->id }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">وضعیت</p>
                            <p class="font-semibold text-center">
                                @if($device->status === 'approved')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-800 text-[10px] font-semibold">تایید</span>
                                @elseif($device->status === 'blocked')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-red-100 text-red-800 text-[10px] font-semibold">بلاک</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-blue-100 text-blue-800 text-[10px] font-semibold">در انتظار</span>
                                @endif
                            </p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">نام فروشگاه</p>
                            <p class="font-semibold break-words text-center">{{ $device->shop_name ?? '-' }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">ثبت کننده</p>
                            <p class="font-semibold break-words text-center">{{ $device->submittedBy?->name ?? ('کاربر #' . ($device->submitted_by_user_id ?? '-')) }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">نام مالک</p>
                            <p class="font-semibold break-words text-center">{{ $device->customer_name ?? '-' }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">شماره تماس</p>
                            <p class="font-semibold break-all text-center" dir="ltr">{{ $device->customer_phone ?? '-' }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">نام دستگاه</p>
                            <p class="font-semibold break-words text-center">{{ $device->model ?? '-' }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">IMEI</p>
                            <p class="font-semibold break-all text-center" dir="ltr">{{ $device->imei ?? '-' }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">رنگ</p>
                            <p class="font-semibold break-words text-center">{{ $device->color ?? '-' }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">کتگوری</p>
                            <p class="font-semibold break-words text-center">{{ $device->category ?? '-' }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">آیدی تذکره</p>
                            <p class="font-semibold break-all text-center" dir="ltr">{{ $device->customer_tazkira_id ?? '-' }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500">آدرس مالک</p>
                            <p class="font-semibold break-words text-center">{{ $device->customer_address ?? '-' }}</p>
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500 mb-1">عکس مالک</p>
                            @if($device->customer_image)
                                <img src="{{ asset('storage/'.$device->customer_image) }}" class="w-8 h-8 rounded-full object-cover mx-auto cursor-pointer" onclick="showImage(this.src)">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($device->customer_name) }}&background=random" class="w-8 h-8 rounded-full object-cover mx-auto">
                            @endif
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500 mb-1">عکس دستگاه</p>
                            @if($device->device_image)
                                <img src="{{ asset('storage/'.$device->device_image) }}" class="w-8 h-8 rounded-full object-cover mx-auto cursor-pointer" onclick="showImage(this.src)">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($device->model) }}&background=0B35CC&color=fff" class="w-8 h-8 rounded-full object-cover mx-auto">
                            @endif
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500 mb-1">عکس تذکره</p>
                            @if($device->tazkira_image)
                                <img src="{{ asset('storage/'.$device->tazkira_image) }}" class="w-8 h-8 rounded-full object-cover mx-auto cursor-pointer" onclick="showImage(this.src)">
                            @else
                                <img src="https://ui-avatars.com/api/?name=ID&background=999999&color=fff" class="w-8 h-8 rounded-full object-cover mx-auto">
                            @endif
                        </div>
                        <div class="min-w-0 text-center">
                            <p class="text-gray-500 mb-1">عکس کارتن</p>
                            @if($device->carton_image)
                                <img src="{{ asset('storage/'.$device->carton_image) }}" class="w-8 h-8 rounded-full object-cover mx-auto cursor-pointer" onclick="showImage(this.src)">
                            @else
                                <img src="https://ui-avatars.com/api/?name=Box&background=cccccc&color=000" class="w-8 h-8 rounded-full object-cover mx-auto">
                            @endif
                        </div>
                    </div>
                    <button type="button" wire:click.prevent="openDeviceDetails({{ $device->id }})" class="mt-3 w-full px-3 py-2 rounded-lg bg-gray-100 text-sm">جزئیات</button>
                </div>
            @empty
                <div class="rounded-xl border border-gray-200 bg-white p-4 text-center text-gray-500">موردی یافت نشد</div>
            @endforelse
        </div>
        <div class="mt-4">{{ $devices->links() }}</div>
    </div>
    @if($showDetailModal)
        @if($selectedDevice)
        @php
            $status = (string) ($selectedDevice->status ?? 'pending');
            $statusLabel = 'در انتظار';
            $headerGradient = 'from-amber-500 to-yellow-500';
            $chipClass = 'bg-amber-100 text-amber-800';
            $surfaceClass = 'border-amber-200';
            $cardClass = 'border-amber-100 bg-amber-50/40';
            if ($status === 'approved') {
                $statusLabel = 'تایید';
                $headerGradient = 'from-blue-700 to-blue-500';
                $chipClass = 'bg-blue-100 text-blue-800';
                $surfaceClass = 'border-blue-200';
                $cardClass = 'border-blue-100 bg-blue-50/40';
            } elseif ($status === 'blocked') {
                $statusLabel = 'بلاک';
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
                            <p class="text-xs text-white/90 mt-1">IMEI: <span dir="ltr">{{ $selectedDevice->imei ?? '-' }}</span></p>
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
                            <p class="font-semibold break-words">{{ $selectedDevice->customer_name ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">شماره تماس</p>
                            <p class="font-semibold break-all" dir="ltr">{{ $selectedDevice->customer_phone ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">آیدی تذکره</p>
                            <p class="font-semibold break-all" dir="ltr">{{ $selectedDevice->customer_tazkira_id ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">آدرس مالک</p>
                            <p class="font-semibold break-words">{{ $selectedDevice->customer_address ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">نام دستگاه</p>
                            <p class="font-semibold break-words">{{ $selectedDevice->model ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">رنگ</p>
                            <p class="font-semibold break-words">{{ $selectedDevice->color ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">کتگوری</p>
                            <p class="font-semibold break-words">{{ $selectedDevice->category ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">نام فروشگاه</p>
                            <p class="font-semibold break-words">{{ $selectedDevice->shop_name ?? '-' }}</p>
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-3">
                            <p class="text-gray-500 text-xs mb-1">یادداشت مدیریت</p>
                            @if($openedFromNotification && $status === 'pending')
                                <textarea wire:model.defer="reviewNote" rows="2" class="w-full rounded-lg border px-2 py-1 text-xs text-gray-700 bg-white" placeholder="یادداشت مدیریت (اختیاری/دلیل رد)"></textarea>
                            @else
                                <p class="font-semibold break-words">{{ $selectedDevice->review_note ?? '-' }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <div class="rounded-lg border {{ $cardClass }} p-2">
                            <p class="text-xs text-gray-500 mb-2 text-center">عکس مالک</p>
                            @if($selectedDevice->customer_image)
                                <img src="{{ asset('storage/' . $selectedDevice->customer_image) }}" class="w-full h-36 object-cover rounded-md border">
                            @else
                                <div class="h-36 rounded-md border border-dashed border-gray-300 text-gray-400 text-xs flex items-center justify-center">ندارد</div>
                            @endif
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-2">
                            <p class="text-xs text-gray-500 mb-2 text-center">عکس تذکره</p>
                            @if($selectedDevice->tazkira_image)
                                <img src="{{ asset('storage/' . $selectedDevice->tazkira_image) }}" class="w-full h-36 object-cover rounded-md border">
                            @else
                                <div class="h-36 rounded-md border border-dashed border-gray-300 text-gray-400 text-xs flex items-center justify-center">ندارد</div>
                            @endif
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-2">
                            <p class="text-xs text-gray-500 mb-2 text-center">عکس دستگاه</p>
                            @if($selectedDevice->device_image)
                                <img src="{{ asset('storage/' . $selectedDevice->device_image) }}" class="w-full h-36 object-cover rounded-md border">
                            @else
                                <div class="h-36 rounded-md border border-dashed border-gray-300 text-gray-400 text-xs flex items-center justify-center">ندارد</div>
                            @endif
                        </div>
                        <div class="rounded-lg border {{ $cardClass }} p-2">
                            <p class="text-xs text-gray-500 mb-2 text-center">عکس کارتن</p>
                            @if($selectedDevice->carton_image)
                                <img src="{{ asset('storage/' . $selectedDevice->carton_image) }}" class="w-full h-36 object-cover rounded-md border">
                            @else
                                <div class="h-36 rounded-md border border-dashed border-gray-300 text-gray-400 text-xs flex items-center justify-center">ندارد</div>
                            @endif
                        </div>
                    </div>
                    @if($openedFromNotification)
                        @if($status === 'pending')
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                <button wire:click="approve" class="w-full px-4 py-2 rounded-lg bg-green-600 text-white text-sm">تایید</button>
                                <button wire:click="reject" class="w-full px-4 py-2 rounded-lg bg-red-600 text-white text-sm">رد</button>
                            </div>
                        @elseif($status === 'approved')
                            <div class="rounded-lg border border-blue-200 bg-blue-50 text-blue-700 text-sm px-3 py-2 text-center">
                                این دستگاه قبلاً تایید شده است.
                            </div>
                        @elseif($status === 'blocked')
                            <div class="rounded-lg border border-red-200 bg-red-50 text-red-700 text-sm px-3 py-2 text-center">
                                این دستگاه قبلاً بلاک شده است.
                            </div>
                        @endif
                    @endif
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
