@php
    $toEnglishNumber = static function ($value): string {
        return strtr((string) $value, [
            '۰' => '0',
            '۱' => '1',
            '۲' => '2',
            '۳' => '3',
            '۴' => '4',
            '۵' => '5',
            '۶' => '6',
            '۷' => '7',
            '۸' => '8',
            '۹' => '9',
            '٠' => '0',
            '١' => '1',
            '٢' => '2',
            '٣' => '3',
            '٤' => '4',
            '٥' => '5',
            '٦' => '6',
            '٧' => '7',
            '٨' => '8',
            '٩' => '9',
        ]);
    };

    $storeImageUrl = static function ($path): ?string {
        $normalized = str_replace('\\', '/', trim((string) $path));
        if ($normalized === '') {
            return null;
        }
        if (str_starts_with($normalized, 'http://') || str_starts_with($normalized, 'https://')) {
            return $normalized;
        }
        if (str_starts_with($normalized, '/storage/')) {
            return asset(ltrim($normalized, '/'));
        }
        if (str_starts_with($normalized, 'storage/')) {
            return asset($normalized);
        }
        if (str_starts_with($normalized, 'public/')) {
            $normalized = substr($normalized, 7);
        }
        return asset('storage/' . ltrim($normalized, '/'));
    };
@endphp

<div class="max-w-full mx-auto p-4">
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4">
        <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">
            <h3 class="font-semibold text-gray-700 text-right">لیست فروشگاه‌ها (همراه عکس مالک و عکس جواز)</h3>

            <div class="flex flex-col sm:flex-row gap-2 w-full lg:w-auto">
                <select wire:model.live="statusFilter" class="input-field sm:w-40">
                    <option value="">همه وضعیت‌ها</option>
                    <option value="1">فعال</option>
                    <option value="0">غیرفعال</option>
                </select>

                <div class="relative w-full sm:w-72">
                    <input wire:model.live.debounce.500ms="search" type="text" class="input-field w-full !pl-10" placeholder="جستجو نام فروشگاه/مالک/تلفن">
                    <span class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-blue-700">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/>
                            <path d="M20 20L16.65 16.65" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </span>
                </div>
            </div>
        </div>

        <div class="mt-4">
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-sm text-center">
                <thead class="bg-[#0B35CC] text-white">
                    <tr>
                        <th class="p-2 text-xs text-center align-middle">آیدی</th>
                        <th class="p-2 text-xs text-center align-middle">نام فروشگاه</th>
                        <th class="p-2 text-xs text-center align-middle">نام مالک</th>
                        <th class="p-2 text-xs text-center align-middle">عکس مالک</th>
                        <th class="p-2 text-xs text-center align-middle">شماره تماس</th>
                        <th class="p-2 text-xs text-center align-middle">آدرس</th>
                        <th class="p-2 text-xs text-center align-middle">شماره جواز</th>
                        <th class="p-2 text-xs text-center align-middle">عکس جواز</th>
                        <th class="p-2 text-xs text-center align-middle">ثبت کننده</th>
                        <th class="p-2 text-xs text-center align-middle">وضعیت</th>
                        <th class="p-2 text-xs text-center align-middle">تاریخ ثبت</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stores as $store)
                        @php
                            $ownerPhotoUrl = $storeImageUrl($store->owner_photo);
                            $licensePhotoUrl = $storeImageUrl($store->license_photo);
                        @endphp
                        <tr class="border-b">
                            <td class="p-2 text-xs font-bold text-center align-middle">{{ (($stores->currentPage() - 1) * $stores->perPage()) + $loop->iteration }}</td>
                            <td class="p-2 text-xs text-center align-middle">{{ $store->store_name }}</td>
                            <td class="p-2 text-xs text-center align-middle">{{ $store->owner_name }}</td>
                            <td class="p-2 text-xs text-center align-middle">
                                @if($ownerPhotoUrl)
                                    <img src="{{ $ownerPhotoUrl }}" alt="owner photo" class="mx-auto w-10 h-10 rounded-full object-cover border border-gray-200" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-block';">
                                    <span class="hidden text-gray-400">ندارد</span>
                                @else
                                    <span class="text-gray-400">ندارد</span>
                                @endif
                            </td>
                            <td class="p-2 text-xs text-center align-middle" dir="ltr">{{ $toEnglishNumber($store->phone) }}</td>
                            <td class="p-2 text-xs text-center align-middle">{{ $store->address }}</td>
                            <td class="p-2 text-xs text-center align-middle" dir="ltr">{{ $toEnglishNumber($store->license_number) }}</td>
                            <td class="p-2 text-xs text-center align-middle">
                                @if($licensePhotoUrl)
                                    <img src="{{ $licensePhotoUrl }}" alt="license photo" class="mx-auto w-10 h-10 rounded object-cover border border-gray-200" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-block';">
                                    <span class="hidden text-gray-400">ندارد</span>
                                @else
                                    <span class="text-gray-400">ندارد</span>
                                @endif
                            </td>
                            <td class="p-2 text-xs text-center align-middle">{{ $store->adminUser?->name ?? '-' }}</td>
                            <td class="p-2 text-xs text-center align-middle">
                                @if((int) $store->status === 1)
                                    <span class="inline-flex px-2 py-0.5 rounded-full bg-green-100 text-green-700">فعال</span>
                                @else
                                    <span class="inline-flex px-2 py-0.5 rounded-full bg-red-100 text-red-700">غیرفعال</span>
                                @endif
                            </td>
                            <td class="p-2 text-xs text-center align-middle">{{ $store->created_at?->format('Y-m-d H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="p-4 text-center text-gray-500">فروشگاهی ثبت نشده است.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden space-y-3">
            @forelse($stores as $store)
                @php
                    $ownerPhotoUrl = $storeImageUrl($store->owner_photo);
                    $licensePhotoUrl = $storeImageUrl($store->license_photo);
                @endphp
                <div class="rounded-xl border border-gray-200 p-3">
                    <div class="grid grid-cols-2 gap-3 text-xs text-center items-start">
                        <div class="flex flex-col items-center justify-center min-w-0">
                            <p class="text-gray-500">نام فروشگاه</p>
                            <p class="font-semibold break-words text-center">{{ $store->store_name }}</p>
                        </div>
                        <div class="flex flex-col items-center justify-center min-w-0">
                            <p class="text-gray-500">نام مالک</p>
                            <p class="font-semibold break-words text-center">{{ $store->owner_name }}</p>
                        </div>
                        <div class="flex flex-col items-center justify-center min-w-0">
                            <p class="text-gray-500">عکس مالک</p>
                            @if($ownerPhotoUrl)
                                <img src="{{ $ownerPhotoUrl }}" alt="owner photo" class="mx-auto mt-1 w-11 h-11 rounded-full object-cover border border-gray-200" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                <p class="hidden mt-1 font-semibold text-gray-400">ندارد</p>
                            @else
                                <p class="mt-1 font-semibold text-gray-400">ندارد</p>
                            @endif
                        </div>
                        <div class="flex flex-col items-center justify-center min-w-0">
                            <p class="text-gray-500">شماره تماس</p>
                            <p class="font-semibold text-center" dir="ltr">{{ $toEnglishNumber($store->phone) }}</p>
                        </div>
                        <div class="flex flex-col items-center justify-center min-w-0">
                            <p class="text-gray-500">شماره جواز</p>
                            <p class="font-semibold break-words text-center" dir="ltr">{{ $toEnglishNumber($store->license_number) }}</p>
                        </div>
                        <div class="flex flex-col items-center justify-center min-w-0">
                            <p class="text-gray-500">عکس جواز</p>
                            @if($licensePhotoUrl)
                                <img src="{{ $licensePhotoUrl }}" alt="license photo" class="mx-auto mt-1 w-11 h-11 rounded object-cover border border-gray-200" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                <p class="hidden mt-1 font-semibold text-gray-400">ندارد</p>
                            @else
                                <p class="mt-1 font-semibold text-gray-400">ندارد</p>
                            @endif
                        </div>
                        <div class="flex flex-col items-center justify-center min-w-0">
                            <p class="text-gray-500">ثبت کننده</p>
                            <p class="font-semibold break-words text-center">{{ $store->adminUser?->name ?? '-' }}</p>
                        </div>
                        <div class="flex flex-col items-center justify-center min-w-0">
                            <p class="text-gray-500">وضعیت</p>
                            @if((int) $store->status === 1)
                                <span class="inline-flex mx-auto px-2 py-0.5 rounded-full bg-green-100 text-green-700">فعال</span>
                            @else
                                <span class="inline-flex mx-auto px-2 py-0.5 rounded-full bg-red-100 text-red-700">غیرفعال</span>
                            @endif
                        </div>
                        <div class="col-span-2 flex flex-col items-center justify-center min-w-0">
                            <p class="text-gray-500">آدرس</p>
                            <p class="font-semibold break-words text-center">{{ $store->address }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-xl border border-gray-200 bg-white p-4 text-center text-gray-500">فروشگاهی ثبت نشده است.</div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $stores->links() }}
        </div>
        </div>
    </div>
</div>
