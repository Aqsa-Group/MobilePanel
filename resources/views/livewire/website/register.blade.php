<div class="space-y-6 py-3">
    @guest
        <div class="max-w-2xl mx-auto bg-white border border-gray-200 rounded-2xl shadow p-5 sm:p-7 text-center">
            <h2 class="text-2xl font-bold text-gray-900">ثبت گزارش سرقت/مفقودی</h2>
            <p class="text-sm text-gray-500 mt-2">
                برای ثبت گزارش باید ابتدا وارد حساب خود شوید یا ثبت نام کنید. مشاهده سایت بدون ثبت‌نام فعال است.
            </p>

            @if(session('info'))
                <div class="mt-4 rounded-xl border border-blue-200 bg-blue-50 px-4 py-3 text-blue-700 text-sm">
                    {{ session('info') }}
                </div>
            @endif
            @if(session('warning'))
                <div class="mt-4 rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-amber-700 text-sm">
                    {{ session('warning') }}
                </div>
            @endif

            <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-3">
                <a href="{{ route('website.signup') }}" class="rounded-xl border border-[#2F25FF] text-[#2F25FF] font-bold py-2 hover:bg-indigo-50 transition">ثبت نام</a>
                <a href="{{ route('website.login') }}" class="rounded-xl bg-slate-800 text-white font-bold py-2 hover:bg-slate-900 transition">ورود</a>
            </div>
        </div>
    @endguest

    @auth
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <div class="bg-white rounded-2xl border border-gray-200 shadow p-4 sm:p-6">
                <h2 class="text-lg text-black font-bold mb-2 text-center">فرم ثبت گزارش سرقت/مفقودی</h2>
                <form wire:submit.prevent="submit" wire:key="{{ $formKey }}" class="grid grid-cols-1 md:grid-cols-2 gap-2 mt-5">
                    <div class="md:col-span-1">
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><path d="M12 12a5 5 0 100-10 5 5 0 000 10zM4 20a8 8 0 0116 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            </span>
                            <input type="text" wire:model.defer="owner_full_name" placeholder="نام مالک" class="w-full border rounded-xl pr-4 pl-10 py-3 text-right" />
                        </div>
                        @error('owner_full_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-1">
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><path d="M4 5a2 2 0 012-2h3l2 5-2 1a11 11 0 005 5l1-2 5 2v3a2 2 0 01-2 2h-1C9.3 21 3 14.7 3 7V6a1 1 0 011-1z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            </span>
                            <input type="tel" wire:model.defer="owner_phone" placeholder="شماره تماس" class="w-full border rounded-xl pr-4 pl-10 py-3 text-right" />
                        </div>
                        @error('owner_phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-1">
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M7 10h4M7 14h3M13 14h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            </span>
                            <input type="text" inputmode="numeric" wire:model.defer="owner_national_id" placeholder="آیدی تذکره" class="w-full border rounded-xl pr-4 pl-10 py-3 text-right" />
                        </div>
                        @error('owner_national_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-1">
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><rect x="7" y="2" width="10" height="20" rx="2" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="18" r="1" fill="currentColor"/></svg>
                            </span>
                            <input type="text" wire:model.defer="device_model" placeholder="مدل دستگاه" class="w-full border rounded-xl pr-4 pl-10 py-3 text-right" />
                        </div>
                        @error('device_model') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-1">
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><path d="M5 8h14M5 12h14M5 16h9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><rect x="3" y="4" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8"/></svg>
                            </span>
                            <input type="text" inputmode="numeric" wire:model.defer="device_imei" placeholder="شماره IMEI (15 رقم)" class="w-full border rounded-xl pr-4 pl-10 py-3 text-right" />
                        </div>
                        @error('device_imei') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-1">
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><path d="M3 9h18l-1 10a2 2 0 01-2 2H6a2 2 0 01-2-2L3 9z" stroke="currentColor" stroke-width="1.8"/><path d="M7 9V6a5 5 0 0110 0v3" stroke="currentColor" stroke-width="1.8"/></svg>
                            </span>
                            <input type="text" wire:model.defer="store_name" placeholder="نام فروشگاه (اختیاری)" class="w-full border rounded-xl pr-4 pl-10 py-3 text-right" />
                        </div>
                        @error('store_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-1 space-y-1">
                        <input type="file" wire:model="owner_photo" id="owner_photo_{{ $formKey }}" accept="image/*" class="hidden" />
                        <label for="owner_photo_{{ $formKey }}" class="w-full border rounded-xl px-3 py-2.5 cursor-pointer flex flex-row-reverse items-center gap-2">
                            <span class="w-9 h-9 rounded border border-gray-200 shrink-0 overflow-hidden bg-gray-50 flex items-center justify-center">
                                @if($owner_photo)
                                    <img src="{{ $owner_photo->temporaryUrl() }}" alt="پیش‌نمایش عکس مالک" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="none"><path d="M4 7h16v10a2 2 0 01-2 2H6a2 2 0 01-2-2V7z" stroke="currentColor" stroke-width="1.8"/><path d="M9 11l2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                                @endif
                            </span>
                            <span class="flex-1 min-w-0 truncate text-right text-sm text-gray-700">
                                @if($owner_photo)
                                    {{ $owner_photo->getClientOriginalName() }}
                                @else
                                    عکس مالک
                                @endif
                            </span>
                        </label>
                        <span wire:loading wire:target="owner_photo" class="text-xs text-blue-700">در حال آپلود...</span>
                        @error('owner_photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-1 space-y-1">
                        <input type="file" wire:model="device_image" id="device_image_{{ $formKey }}" accept="image/*" class="hidden" />
                        <label for="device_image_{{ $formKey }}" class="w-full border rounded-xl px-3 py-2.5 cursor-pointer flex flex-row-reverse items-center gap-2">
                            <span class="w-9 h-9 rounded border border-gray-200 shrink-0 overflow-hidden bg-gray-50 flex items-center justify-center">
                                @if($device_image)
                                    <img src="{{ $device_image->temporaryUrl() }}" alt="پیش‌نمایش عکس دستگاه" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-4 h-4 text-gray-400" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><circle cx="9" cy="10" r="1.4" fill="currentColor"/><path d="M6 16l4-3 2 2 3-2 3 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                                @endif
                            </span>
                            <span class="flex-1 min-w-0 truncate text-right text-sm text-gray-700">
                                @if($device_image)
                                    {{ $device_image->getClientOriginalName() }}
                                @else
                                    عکس دستگاه
                                @endif
                            </span>
                        </label>
                        <span wire:loading wire:target="device_image" class="text-xs text-blue-700">در حال آپلود...</span>
                        @error('device_image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-1">
                        <select wire:model.defer="incident_type" class="w-full border rounded-xl px-4 py-3 text-right">
                            <option value="">نوع حادثه</option>
                            <option value="lost">گم شده</option>
                            <option value="stolen">سرقت شده</option>
                        </select>
                        @error('incident_type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-1">
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><path d="M12 22s7-5.4 7-12a7 7 0 10-14 0c0 6.6 7 12 7 12z" stroke="currentColor" stroke-width="1.8"/><circle cx="12" cy="10" r="2.5" stroke="currentColor" stroke-width="1.8"/></svg>
                            </span>
                            <input type="text" wire:model.defer="incident_location" placeholder="محل وقوع حادثه" class="w-full border rounded-xl pr-4 pl-10 py-3 text-right" />
                        </div>
                        @error('incident_location') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <div class="relative">
                            <span class="absolute left-3 top-4 text-gray-400">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"><path d="M4 5h16v14H4z" stroke="currentColor" stroke-width="1.8"/><path d="M8 9h8M8 13h8M8 17h5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            </span>
                            <textarea wire:model.defer="incident_description" rows="3" placeholder="توضیحات بیشتر" class="w-full border rounded-xl pr-4 pl-10 py-3 text-right"></textarea>
                        </div>
                        @error('incident_description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="md:col-span-2 flex gap-3 mt-1">
                        <button type="button" wire:click="resetForm" class="flex-1 bg-red-600 hover:bg-red-700 text-white rounded-xl py-3 font-semibold">
                            لغو
                        </button>
                        <button type="submit" class="flex-1 bg-[#2F25FF] hover:bg-[#241dd1] text-white rounded-xl py-3 font-semibold">
                            ثبت گزارش
                        </button>
                    </div>
                </form>
            </div>
            <div class="hidden lg:flex items-center justify-center ">
                <img
                    src="https://i.postimg.cc/QC4nPTSK/undraw-newsfeed-8ms9.png"
                    alt="report"
                    class="h-[500px] w-full "
                >
            </div>
        </div>
    @endauth
</div>
