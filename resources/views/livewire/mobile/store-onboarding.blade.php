<div class="max-w-4xl mx-auto p-4 space-y-4">
    @if (session()->has('success'))
        <div class="rounded-lg border border-emerald-200 bg-emerald-50 text-emerald-700 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="rounded-lg border border-red-200 bg-red-50 text-red-700 px-4 py-3 text-sm">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 sm:p-6">
        <div class="rounded-lg border border-amber-200 bg-amber-50 text-amber-800 px-4 py-3 text-sm mb-4 leading-7">
            لطفا این فورم را با دقت کامل یک‌بار تکمیل نمایید؛ بعد از ثبت نهایی، امکان ویرایش این مشخصات برای کاربران وجود ندارد.
        </div>

        <h2 class="text-xl font-bold text-gray-700 mb-1">ثبت مشخصات فروشگاه</h2>
        <p class="text-xs text-gray-500 mb-4">برای ادامه استفاده از پنل، ابتدا مشخصات فروشگاه را ثبت کنید.</p>

        <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6 mb-1">
                <div class="flex flex-col items-center gap-2">
                    <label class="relative w-28 h-28 sm:w-36 sm:h-36 rounded-full border-2 border-dashed border-blue-500 bg-blue-50 overflow-hidden cursor-pointer group">
                        <input wire:model="owner_photo" type="file" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                        @if($owner_photo)
                            <img src="{{ $owner_photo->temporaryUrl() }}" alt="پیش‌نمایش عکس مالک" class="w-full h-full object-cover">
                            <span class="absolute inset-0 bg-black/35 text-white text-xs flex items-center justify-center opacity-0 group-hover:opacity-100 transition">تغییر عکس</span>
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center gap-1 text-blue-700 text-xs">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M5.5 20c0-3.2 2.9-5.5 6.5-5.5s6.5 2.3 6.5 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                                <span>عکس مالک</span>
                            </div>
                        @endif
                        <span class="absolute left-1.5 bottom-1.5 w-6 h-6 rounded-full bg-white/95 text-blue-700 flex items-center justify-center border border-blue-200">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </label>
                    <span class="text-xs text-gray-600">برای انتخاب/تغییر عکس مالک کلیک کنید</span>
                    <span wire:loading wire:target="owner_photo" class="text-xs text-blue-700">در حال آپلود...</span>
                    @error('owner_photo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col items-center gap-2">
                    <label class="relative w-28 h-28 sm:w-36 sm:h-36 rounded-full border-2 border-dashed border-blue-500 bg-blue-50 overflow-hidden cursor-pointer group">
                        <input wire:model="license_photo" type="file" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                        @if($license_photo)
                            <img src="{{ $license_photo->temporaryUrl() }}" alt="پیش‌نمایش عکس جواز" class="w-full h-full object-cover">
                            <span class="absolute inset-0 bg-black/35 text-white text-xs flex items-center justify-center opacity-0 group-hover:opacity-100 transition">تغییر عکس</span>
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center gap-1 text-blue-700 text-xs">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                    <rect x="5" y="3.5" width="14" height="17" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M8 8.5h8M8 12h8M8 15.5h5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                                <span>عکس جواز</span>
                            </div>
                        @endif
                        <span class="absolute left-1.5 bottom-1.5 w-6 h-6 rounded-full bg-white/95 text-blue-700 flex items-center justify-center border border-blue-200">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </label>
                    <span class="text-xs text-gray-600">برای انتخاب/تغییر عکس جواز کلیک کنید</span>
                    <span wire:loading wire:target="license_photo" class="text-xs text-blue-700">در حال آپلود...</span>
                    @error('license_photo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <input wire:model.defer="store_name" type="text" class="input-field" placeholder="نام فروشگاه">
                @error('store_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <input wire:model.defer="owner_name" type="text" class="input-field" placeholder="نام مالک">
                @error('owner_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="md:col-span-2">
                <input wire:model.defer="address" type="text" class="input-field" placeholder="آدرس فروشگاه">
                @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <input wire:model.defer="phone" type="text" inputmode="numeric" class="input-field" placeholder="شماره تماس">
                <p class="text-[11px] text-gray-500 mt-1">اعداد فارسی/انگلیسی پذیرفته می‌شود.</p>
                @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <input wire:model.defer="tazkira_id" type="text" inputmode="numeric" class="input-field" placeholder="آیدی تذکره">
                <p class="text-[11px] text-gray-500 mt-1">اعداد فارسی/انگلیسی پذیرفته می‌شود.</p>
                @error('tazkira_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="md:col-span-2">
                <input wire:model.defer="license_number" type="text" inputmode="numeric" class="input-field" placeholder="شماره جواز">
                <p class="text-[11px] text-gray-500 mt-1">اعداد فارسی/انگلیسی پذیرفته می‌شود.</p>
                @error('license_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="md:col-span-2">
                <button type="submit" class="w-full rounded-lg bg-blue-900 hover:bg-blue-700 text-white py-3">
                    ثبت نهایی فروشگاه
                </button>
            </div>
        </form>
    </div>

    @if($showAiModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4">
            <div class="bg-white rounded-2xl max-w-xl w-full border border-red-100 shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-red-600 to-rose-500 px-5 py-4 text-white flex items-start gap-3">
                    <span class="mt-0.5">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                            <path d="M12 8v5m0 4h.01M10.3 3.9L2.9 17a2 2 0 001.74 3h14.72a2 2 0 001.74-3L13.7 3.9a2 2 0 00-3.4 0z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <div class="flex-1">
                        <h4 class="font-bold text-base">هشدار بررسی هوش مصنوعی</h4>
                        <p class="text-xs text-red-100 mt-1">برای ادامه ثبت، موارد زیر را اصلاح کنید.</p>
                    </div>
                    <span class="text-xs bg-white/20 rounded-full px-2.5 py-1 whitespace-nowrap">{{ count($aiIssues) }} مورد</span>
                </div>
                <div class="p-5 space-y-2 max-h-[60vh] overflow-y-auto">
                    @foreach($aiIssues as $issue)
                        <div class="flex items-start gap-2 rounded-lg border border-red-200 bg-red-50 px-3 py-2">
                            <span class="text-red-600 mt-0.5">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <p class="text-sm text-red-800 leading-6">{{ $issue }}</p>
                        </div>
                    @endforeach
                    <div class="rounded-lg border border-blue-200 bg-blue-50 px-3 py-2 text-xs text-blue-800">
                        نکته: عکس‌ها را واضح، بدون لرزش و با نور متعادل ثبت کنید. عکس مالک باید واضح و بدون عینک/لنز باشد.
                    </div>
                </div>
                <div class="px-5 py-4 bg-gray-50 flex justify-end">
                    <button wire:click="closeAiModal" class="px-4 py-2 rounded-lg bg-blue-700 text-white hover:bg-blue-800">متوجه شدم</button>
                </div>
            </div>
        </div>
    @endif
</div>
