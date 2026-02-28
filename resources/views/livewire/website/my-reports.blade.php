<div class="space-y-5 py-3">
    <div class="bg-white rounded-2xl border border-gray-200 shadow p-4 sm:p-6">
        <div class="flex items-center justify-between gap-3 mb-4">
            <h2 class="text-xl font-bold text-gray-900">لیست گزارشات من</h2>
            <span class="text-xs text-gray-500">{{ $reports->total() }} مورد</span>
        </div>
        @if($reports->count() === 0)
            <div class="rounded-xl border border-dashed border-gray-300 p-6 text-center text-sm text-gray-500">
                هنوز گزارشی ثبت نشده است.
            </div>
        @else
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-[#2F25FF] text-white">
                        <tr>
                            <th class="p-2 text-center">آیدی</th>
                            <th class="p-2 text-center">مالک</th>
                            <th class="p-2 text-center">IMEI</th>
                            <th class="p-2 text-center">نوع حادثه</th>
                            <th class="p-2 text-center">وضعیت</th>
                            <th class="p-2 text-center">تاریخ ثبت</th>
                            <th class="p-2 text-center">جزئیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr class="border-b">
                                <td class="p-2 text-center">{{ (($reports->currentPage() - 1) * $reports->perPage()) + $loop->iteration }}</td>
                                <td class="p-2 text-center">{{ $report->owner_full_name }}</td>
                                <td class="p-2 text-center" dir="ltr">{{ $report->device_imei }}</td>
                                <td class="p-2 text-center">{{ $report->incident_type === 'stolen' ? 'سرقت' : 'مفقودی' }}</td>
                                <td class="p-2 text-center">
                                    @if(in_array($report->status, ['verified', 'rejected'], true))
                                        <span class="px-2 py-1 rounded-full text-xs bg-red-100 text-red-700">بلاک شد</span>
                                    @elseif($report->status === 'resolved')
                                        <span class="px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-700">حل‌شده</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-xs bg-amber-100 text-amber-700">در انتظار</span>
                                    @endif
                                </td>
                                <td class="p-2 text-center">
                                    {{ $report->created_at ? \Morilog\Jalali\Jalalian::fromDateTime($report->created_at)->format('Y/m/d') . ' ' . $report->created_at->format('h:i A') : '-' }}
                                </td>
                                <td class="p-2 text-center">
                                    <button type="button" wire:click="openReportDetails({{ $report->id }})" class="px-3 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 text-xs">
                                        مشاهده
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="md:hidden space-y-3">
                @foreach($reports as $report)
                    <div class="rounded-xl border border-gray-200 p-3">
                        <div class="grid grid-cols-2 gap-2 text-xs">
                            <div class="text-center">
                                <p class="text-gray-500">آیدی</p>
                                <p class="font-semibold">{{ (($reports->currentPage() - 1) * $reports->perPage()) + $loop->iteration }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-500">وضعیت</p>
                                <p class="font-semibold flex justify-center">
                                    @if(in_array($report->status, ['verified', 'rejected'], true))
                                        <span class="px-2 py-1 rounded-full text-[10px] bg-red-100 text-red-700">بلاک شد</span>
                                    @elseif($report->status === 'resolved')
                                        <span class="px-2 py-1 rounded-full text-[10px] bg-blue-100 text-blue-700">حل‌شده</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-[10px] bg-amber-100 text-amber-700">در انتظار</span>
                                    @endif
                                </p>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-500">مالک</p>
                                <p class="font-semibold">{{ $report->owner_full_name }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-500">IMEI</p>
                                <p class="font-semibold" dir="ltr">{{ $report->device_imei }}</p>
                            </div>
                        </div>
                        <button type="button" wire:click="openReportDetails({{ $report->id }})" class="mt-3 w-full rounded-lg bg-slate-100 py-2 text-sm font-semibold">
                            مشاهده جزئیات
                        </button>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $reports->links() }}
            </div>
        @endif
    </div>
    @if($showDetailModal && $selectedReport)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div class="w-full max-w-3xl rounded-2xl bg-white shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-[#2F25FF] to-blue-500 px-4 py-3 text-white flex items-center justify-between">
                    <h4 class="font-bold">جزئیات گزارش</h4>
                    <button type="button" wire:click="closeReportDetails" class="h-8 w-8 rounded-full bg-white/20 hover:bg-white/30">✕</button>
                </div>
                <div class="p-4 sm:p-5 grid grid-cols-1 md:grid-cols-2 gap-3 text-sm max-h-[70vh] overflow-y-auto">
                    <div class="rounded-lg border p-3">
                        <p class="text-gray-500 text-xs mb-1">نام مالک</p>
                        <p class="font-semibold">{{ $selectedReport->owner_full_name }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-gray-500 text-xs mb-1">شماره تماس</p>
                        <p class="font-semibold" dir="ltr">{{ $selectedReport->owner_phone }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-gray-500 text-xs mb-1">آیدی تذکره</p>
                        <p class="font-semibold" dir="ltr">{{ $selectedReport->owner_national_id ?: '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-gray-500 text-xs mb-1">نام فروشگاه</p>
                        <p class="font-semibold">{{ $selectedReport->store_name ?: '-' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-gray-500 text-xs mb-1">مدل دستگاه</p>
                        <p class="font-semibold">{{ $selectedReport->device_model }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-gray-500 text-xs mb-1">IMEI</p>
                        <p class="font-semibold" dir="ltr">{{ $selectedReport->device_imei }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-gray-500 text-xs mb-1">نوع حادثه</p>
                        <p class="font-semibold">{{ $selectedReport->incident_type === 'stolen' ? 'سرقت' : 'مفقودی' }}</p>
                    </div>
                    <div class="rounded-lg border p-3">
                        <p class="text-gray-500 text-xs mb-1">محل حادثه</p>
                        <p class="font-semibold">{{ $selectedReport->incident_location }}</p>
                    </div>
                    <div class="rounded-lg border p-3 md:col-span-2">
                        <p class="text-gray-500 text-xs mb-1">توضیحات</p>
                        <p class="font-semibold">{{ $selectedReport->incident_description ?: '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
