<div class="w-full space-y-5">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="relative rounded-xl bg-white shadow border border-gray-200 p-4 overflow-hidden">
            <span class="absolute right-0 top-0 bottom-0 w-2 bg-[#0B35CC]"></span>
            <p class="text-xs text-gray-500">تعداد گزارشات امروز</p>
            <p class="text-3xl font-extrabold mt-2 text-gray-900">{{ number_format($stats['reports_today'] ?? 0) }}</p>
        </div>
        <div class="relative rounded-xl bg-white shadow border border-gray-200 p-4 overflow-hidden">
            <span class="absolute right-0 top-0 bottom-0 w-2 bg-[#0B35CC]"></span>
            <p class="text-xs text-gray-500">تعداد گزارشات کل</p>
            <p class="text-3xl font-extrabold mt-2 text-gray-900">{{ number_format($stats['reports_total'] ?? 0) }}</p>
        </div>
        <div class="relative rounded-xl bg-white shadow border border-gray-200 p-4 overflow-hidden">
            <span class="absolute right-0 top-0 bottom-0 w-2 bg-[#0B35CC]"></span>
            <p class="text-xs text-gray-500">بازدیدکنندگان امروز سایت</p>
            <p class="text-3xl font-extrabold mt-2 text-gray-900">{{ number_format($stats['visitors_today'] ?? 0) }}</p>
        </div>
        <div class="relative rounded-xl bg-white shadow border border-gray-200 p-4 overflow-hidden">
            <span class="absolute right-0 top-0 bottom-0 w-2 bg-[#0B35CC]"></span>
            <p class="text-xs text-gray-500">تعداد کل فروشندگان</p>
            <p class="text-3xl font-extrabold mt-2 text-gray-900">{{ number_format($stats['sellers_total'] ?? 0) }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            <div class="lg:col-span-2 relative">
                <input
                    type="text"
                    wire:model.live.debounce.400ms="search"
                    class="w-full border rounded-xl py-2 pr-3 pl-10 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="جستجو بر اساس نام، IMEI، موبایل، فروشگاه..."
                >
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"></circle>
                        <path d="M20 20L17 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                    </svg>
                </span>
            </div>
            <select wire:model.live="incidentFilter" class="w-full border rounded-xl py-2 px-3 text-sm">
                <option value="">نوع حادثه</option>
                <option value="stolen">سرقت</option>
                <option value="lost">مفقودی</option>
            </select>
            <select wire:model.live="statusFilter" class="w-full border rounded-xl py-2 px-3 text-sm">
                <option value="">وضعیت</option>
                <option value="pending">در انتظار</option>
                <option value="verified">تایید</option>
                <option value="rejected">رد</option>
                <option value="resolved">حل‌شده</option>
            </select>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-3 sm:p-4">
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-xs">
                <thead class="bg-[#0B35CC] text-white">
                    <tr>
                        <th class="p-2 text-right">آیدی</th>
                        <th class="p-2 text-right">مالک</th>
                        <th class="p-2 text-right">موبایل</th>
                        <th class="p-2 text-right">فروشگاه</th>
                        <th class="p-2 text-right">دستگاه</th>
                        <th class="p-2 text-right">IMEI</th>
                        <th class="p-2 text-right">نوع حادثه</th>
                        <th class="p-2 text-right">وضعیت</th>
                        <th class="p-2 text-right">تاریخ</th>
                        <th class="p-2 text-right">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)
                        <tr class="border-b">
                            <td class="p-2">{{ $report->id }}</td>
                            <td class="p-2">{{ $report->owner_full_name }}</td>
                            <td class="p-2" dir="ltr">{{ $report->owner_phone }}</td>
                            <td class="p-2">{{ $report->store_name ?: '-' }}</td>
                            <td class="p-2">{{ $report->device_model }}</td>
                            <td class="p-2" dir="ltr">{{ $report->device_imei }}</td>
                            <td class="p-2">{{ $report->incident_type === 'stolen' ? 'سرقت' : 'مفقودی' }}</td>
                            <td class="p-2">
                                @if($report->status === 'verified')
                                    <span class="inline-flex px-2 py-1 rounded-full text-[10px] bg-green-100 text-green-700">تایید</span>
                                @elseif($report->status === 'rejected')
                                    <span class="inline-flex px-2 py-1 rounded-full text-[10px] bg-red-100 text-red-700">رد</span>
                                @elseif($report->status === 'resolved')
                                    <span class="inline-flex px-2 py-1 rounded-full text-[10px] bg-blue-100 text-blue-700">حل‌شده</span>
                                @else
                                    <span class="inline-flex px-2 py-1 rounded-full text-[10px] bg-amber-100 text-amber-700">در انتظار</span>
                                @endif
                            </td>
                            <td class="p-2">
                                {{ $report->created_at ? \Morilog\Jalali\Jalalian::fromDateTime($report->created_at)->format('Y/m/d') . ' ' . $report->created_at->format('h:i A') : '-' }}
                            </td>
                            <td class="p-2">
                                <button type="button" wire:click="openReportDetails({{ $report->id }})" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200">
                                    جزئیات
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="p-4 text-center text-gray-500">گزارشی یافت نشد.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden space-y-3">
            @forelse($reports as $report)
                <div class="rounded-xl border border-gray-200 p-3">
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div>
                            <p class="text-gray-500">آیدی</p>
                            <p class="font-semibold">{{ $report->id }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">وضعیت</p>
                            <p class="font-semibold">
                                @if($report->status === 'verified')
                                    <span class="inline-flex px-2 py-1 rounded-full text-[10px] bg-green-100 text-green-700">تایید</span>
                                @elseif($report->status === 'rejected')
                                    <span class="inline-flex px-2 py-1 rounded-full text-[10px] bg-red-100 text-red-700">رد</span>
                                @elseif($report->status === 'resolved')
                                    <span class="inline-flex px-2 py-1 rounded-full text-[10px] bg-blue-100 text-blue-700">حل‌شده</span>
                                @else
                                    <span class="inline-flex px-2 py-1 rounded-full text-[10px] bg-amber-100 text-amber-700">در انتظار</span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-gray-500">مالک</p>
                            <p class="font-semibold">{{ $report->owner_full_name }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">IMEI</p>
                            <p class="font-semibold" dir="ltr">{{ $report->device_imei }}</p>
                        </div>
                    </div>
                    <button type="button" wire:click="openReportDetails({{ $report->id }})" class="mt-3 w-full rounded-lg bg-slate-100 py-2 text-sm font-semibold">
                        جزئیات
                    </button>
                </div>
            @empty
                <div class="rounded-xl border border-gray-200 bg-white p-4 text-center text-gray-500">گزارشی یافت نشد.</div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>

    @if($showDetailModal && $selectedReport)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="w-full max-w-4xl rounded-2xl bg-white shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-[#0B35CC] to-blue-500 text-white px-4 py-3 flex items-center justify-between">
                    <h4 class="font-bold">جزئیات گزارش #{{ $selectedReport->id }}</h4>
                    <button type="button" wire:click="closeReportDetails" class="h-8 w-8 rounded-full bg-white/20 hover:bg-white/30">✕</button>
                </div>
                <div class="p-4 sm:p-5 max-h-[75vh] overflow-y-auto grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">نام مالک</p>
                        <p class="font-semibold">{{ $selectedReport->owner_full_name }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">شماره تماس</p>
                        <p class="font-semibold" dir="ltr">{{ $selectedReport->owner_phone }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">آیدی تذکره</p>
                        <p class="font-semibold" dir="ltr">{{ $selectedReport->owner_national_id ?: '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">نام فروشگاه</p>
                        <p class="font-semibold">{{ $selectedReport->store_name ?: '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">مدل دستگاه</p>
                        <p class="font-semibold">{{ $selectedReport->device_model }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">IMEI</p>
                        <p class="font-semibold" dir="ltr">{{ $selectedReport->device_imei }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">نوع حادثه</p>
                        <p class="font-semibold">{{ $selectedReport->incident_type === 'stolen' ? 'سرقت' : 'مفقودی' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">وضعیت</p>
                        <p class="font-semibold">{{ $selectedReport->status }}</p>
                    </div>
                    <div class="rounded-lg border p-3 md:col-span-2">
                        <p class="text-xs text-gray-500 mb-1">محل حادثه</p>
                        <p class="font-semibold">{{ $selectedReport->incident_location }}</p>
                    </div>
                    <div class="rounded-lg border p-3 md:col-span-2">
                        <p class="text-xs text-gray-500 mb-1">توضیحات</p>
                        <p class="font-semibold">{{ $selectedReport->incident_description ?: '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3 md:col-span-2">
                        <p class="text-xs text-gray-500 mb-1">دلیل بلاک برای فروشندگان</p>
                        <textarea wire:model.defer="blockReason" rows="3" class="w-full rounded-lg border px-2 py-1 text-xs text-gray-700 bg-white" placeholder="علت بلاک را دقیق بنویسید..."></textarea>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">عکس مالک</p>
                        @if($selectedReport->owner_photo)
                            <img src="{{ asset('storage/' . $selectedReport->owner_photo) }}" class="w-full h-40 rounded-lg object-cover border">
                        @else
                            <div class="h-40 rounded-lg border border-dashed border-gray-300 text-xs text-gray-400 flex items-center justify-center">ندارد</div>
                        @endif
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-xs text-gray-500 mb-1">عکس دستگاه</p>
                        @if($selectedReport->device_image)
                            <img src="{{ asset('storage/' . $selectedReport->device_image) }}" class="w-full h-40 rounded-lg object-cover border">
                        @else
                            <div class="h-40 rounded-lg border border-dashed border-gray-300 text-xs text-gray-400 flex items-center justify-center">ندارد</div>
                        @endif
                    </div>
                    <div class="md:col-span-2 flex flex-col sm:flex-row gap-2">
                        <button type="button" wire:click="blockForSellers" class="w-full px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white text-sm font-semibold">
                            بلاک این دستگاه در تمام پنل‌های فروشندگان
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
