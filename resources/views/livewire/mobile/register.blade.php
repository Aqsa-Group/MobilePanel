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
                <h4 class="text-base font-bold text-emerald-700">ثبت موفق</h4>
                <p class="mt-2 text-sm text-gray-700">{{ session('success') }}</p>
            </div>
        </div>
    @endif
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-4 sm:p-6">
        <h2 class="text-xl font-bold text-gray-700 mb-4">ثبت دستگاه</h2>
        <form wire:submit.prevent="save" novalidate class="grid grid-cols-1 lg:grid-cols-2 gap-4" wire:key="register-form-{{ $formKey }}">
            <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6 mb-1">
                <div class="hidden sm:flex flex-col items-center gap-2">
                    <label class="relative w-32 h-32 sm:w-36 sm:h-36 rounded-full border-2 border-dashed border-blue-500 bg-blue-50 overflow-hidden cursor-pointer group">
                        <input wire:model="customer_image" id="customer_image_{{ $formKey }}" type="file" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                        @if($customer_image)
                            <img src="{{ $customer_image->temporaryUrl() }}" alt="پیش نمایش عکس مشتری" class="w-full h-full object-cover">
                            <span class="absolute inset-0 bg-black/35 text-white text-xs flex items-center justify-center opacity-0 group-hover:opacity-100 transition">تغییر عکس</span>
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center gap-1 text-blue-700 text-xs">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                    <path d="M15 19l-1-4h-4l-1 4M9 11a3 3 0 116 0 3 3 0 01-6 0z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <rect x="3.5" y="4.5" width="17" height="15" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                                <span>عکس مشتری</span>
                            </div>
                        @endif
                        <span class="absolute left-1.5 bottom-1.5 w-6 h-6 rounded-full bg-white/95 text-blue-700 flex items-center justify-center border border-blue-200">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </label>
                    <span class="text-xs text-gray-600">برای انتخاب/تغییر عکس مشتری کلیک کنید</span>
                    <span wire:loading wire:target="customer_image" class="text-xs text-blue-700">در حال آپلود...</span>
                    @error('customer_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col items-center gap-2">
                    <label class="relative w-32 h-32 sm:w-36 sm:h-36 rounded-full border-2 border-dashed border-blue-500 bg-blue-50 overflow-hidden cursor-pointer group">
                        <input wire:model="device_image" id="device_image_{{ $formKey }}" type="file" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                        @if($device_image)
                            <img src="{{ $device_image->temporaryUrl() }}" alt="پیش نمایش عکس دستگاه" class="w-full h-full object-cover">
                            <span class="absolute inset-0 bg-black/35 text-white text-xs flex items-center justify-center opacity-0 group-hover:opacity-100 transition">تغییر عکس</span>
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center gap-1 text-blue-700 text-xs">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                    <rect x="7" y="2.5" width="10" height="19" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                    <circle cx="12" cy="18" r="1" fill="currentColor"/>
                                </svg>
                                <span>عکس دستگاه</span>
                            </div>
                        @endif
                        <span class="absolute left-1.5 bottom-1.5 w-6 h-6 rounded-full bg-white/95 text-blue-700 flex items-center justify-center border border-blue-200">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </label>
                    <span class="text-xs text-gray-600">برای انتخاب/تغییر عکس دستگاه کلیک کنید</span>
                    <span wire:loading wire:target="device_image" class="text-xs text-blue-700">در حال آپلود...</span>
                    @error('device_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="space-y-3">
                <h3 class="font-semibold text-blue-800">مشخصات مشتری</h3>
                <div class="relative">
                    <input wire:model.defer="customer_name" type="text" class="input-field !pl-11" placeholder="نام کامل" required>
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle> <path d="M19.9975 18C20 17.8358 20 17.669 20 17.5C20 15.0147 16.4183 13 12 13C7.58172 13 4 15.0147 4 17.5C4 19.9853 4 22 12 22C14.231 22 15.8398 21.8433 17 21.5634" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                    </span>
                </div>
                @error('customer_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <div class="relative">
                    <input wire:model.defer="customer_phone" type="text" class="input-field !pl-11" placeholder="شماره تماس" required>
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.1007 13.359L15.5719 12.8272H15.5719L16.1007 13.359ZM16.5562 12.9062L17.085 13.438H17.085L16.5562 12.9062ZM18.9728 12.5894L18.6146 13.2483L18.9728 12.5894ZM20.8833 13.628L20.5251 14.2869L20.8833 13.628ZM21.4217 16.883L21.9505 17.4148L21.4217 16.883ZM20.0011 18.2954L19.4723 17.7636L20.0011 18.2954ZM18.6763 18.9651L18.7459 19.7119H18.7459L18.6763 18.9651ZM8.81536 14.7266L9.34418 14.1947L8.81536 14.7266ZM4.00289 5.74561L3.2541 5.78816L3.2541 5.78816L4.00289 5.74561ZM10.4775 7.19738L11.0063 7.72922H11.0063L10.4775 7.19738ZM10.6342 4.54348L11.2346 4.09401L10.6342 4.54348ZM9.37326 2.85908L8.77286 3.30855V3.30855L9.37326 2.85908ZM6.26145 2.57483L6.79027 3.10667H6.79027L6.26145 2.57483ZM4.69185 4.13552L4.16303 3.60368H4.16303L4.69185 4.13552ZM12.0631 11.4972L12.5919 10.9654L12.0631 11.4972ZM16.6295 13.8909L17.085 13.438L16.0273 12.3743L15.5719 12.8272L16.6295 13.8909ZM18.6146 13.2483L20.5251 14.2869L21.2415 12.9691L19.331 11.9305L18.6146 13.2483ZM20.8929 16.3511L19.4723 17.7636L20.5299 18.8273L21.9505 17.4148L20.8929 16.3511ZM18.6067 18.2184C17.1568 18.3535 13.4056 18.2331 9.34418 14.1947L8.28654 15.2584C12.7186 19.6653 16.9369 19.8805 18.7459 19.7119L18.6067 18.2184ZM9.34418 14.1947C5.4728 10.3453 4.83151 7.10765 4.75168 5.70305L3.2541 5.78816C3.35456 7.55599 4.14863 11.144 8.28654 15.2584L9.34418 14.1947ZM10.7195 8.01441L11.0063 7.72922L9.9487 6.66555L9.66189 6.95073L10.7195 8.01441ZM11.2346 4.09401L9.97365 2.40961L8.77286 3.30855L10.0338 4.99296L11.2346 4.09401ZM5.73263 2.04299L4.16303 3.60368L5.22067 4.66736L6.79027 3.10667L5.73263 2.04299ZM10.1907 7.48257C9.66189 6.95073 9.66117 6.95144 9.66045 6.95216C9.66021 6.9524 9.65949 6.95313 9.659 6.95362C9.65802 6.95461 9.65702 6.95561 9.65601 6.95664C9.65398 6.95871 9.65188 6.96086 9.64972 6.9631C9.64539 6.96759 9.64081 6.97245 9.63599 6.97769C9.62634 6.98816 9.61575 7.00014 9.60441 7.01367C9.58174 7.04072 9.55605 7.07403 9.52905 7.11388C9.47492 7.19377 9.41594 7.2994 9.36589 7.43224C9.26376 7.70329 9.20901 8.0606 9.27765 8.50305C9.41189 9.36833 10.0078 10.5113 11.5343 12.0291L12.5919 10.9654C11.1634 9.54499 10.8231 8.68059 10.7599 8.27309C10.7298 8.07916 10.761 7.98371 10.7696 7.96111C10.7748 7.94713 10.7773 7.9457 10.7709 7.95525C10.7677 7.95992 10.7624 7.96723 10.7541 7.97708C10.75 7.98201 10.7451 7.98759 10.7394 7.99381C10.7365 7.99692 10.7335 8.00019 10.7301 8.00362C10.7285 8.00534 10.7268 8.00709 10.725 8.00889C10.7241 8.00979 10.7232 8.0107 10.7223 8.01162C10.7219 8.01208 10.7212 8.01278 10.7209 8.01301C10.7202 8.01371 10.7195 8.01441 10.1907 7.48257ZM11.5343 12.0291C13.0613 13.5474 14.2096 14.1383 15.0763 14.2713C15.5192 14.3392 15.8763 14.285 16.1472 14.1841C16.28 14.1346 16.3858 14.0763 16.4658 14.0227C16.5058 13.9959 16.5392 13.9704 16.5663 13.9479C16.5799 13.9367 16.5919 13.9262 16.6024 13.9166C16.6077 13.9118 16.6126 13.9073 16.6171 13.903C16.6194 13.9008 16.6215 13.8987 16.6236 13.8967C16.6246 13.8957 16.6256 13.8947 16.6266 13.8937C16.6271 13.8932 16.6279 13.8925 16.6281 13.8923C16.6288 13.8916 16.6295 13.8909 16.1007 13.359C15.5719 12.8272 15.5726 12.8265 15.5733 12.8258C15.5735 12.8256 15.5742 12.8249 15.5747 12.8244C15.5756 12.8235 15.5765 12.8226 15.5774 12.8217C15.5793 12.82 15.581 12.8183 15.5827 12.8166C15.5862 12.8133 15.5895 12.8103 15.5926 12.8074C15.5988 12.8018 15.6044 12.7969 15.6094 12.7929C15.6192 12.7847 15.6265 12.7795 15.631 12.7764C15.6403 12.7702 15.6384 12.773 15.6236 12.7785C15.5991 12.7876 15.501 12.8189 15.3038 12.7886C14.8905 12.7253 14.02 12.3853 12.5919 10.9654L11.5343 12.0291ZM9.97365 2.40961C8.95434 1.04802 6.94996 0.83257 5.73263 2.04299L6.79027 3.10667C7.32195 2.578 8.26623 2.63181 8.77286 3.30855L9.97365 2.40961ZM4.75168 5.70305C4.73201 5.35694 4.89075 4.9954 5.22067 4.66736L4.16303 3.60368C3.62571 4.13795 3.20329 4.89425 3.2541 5.78816L4.75168 5.70305ZM19.4723 17.7636C19.1975 18.0369 18.9029 18.1908 18.6067 18.2184L18.7459 19.7119C19.4805 19.6434 20.0824 19.2723 20.5299 18.8273L19.4723 17.7636ZM11.0063 7.72922C11.9908 6.7503 12.064 5.2019 11.2346 4.09401L10.0338 4.99295C10.4373 5.53193 10.3773 6.23938 9.9487 6.66555L11.0063 7.72922ZM20.5251 14.2869C21.3429 14.7315 21.4703 15.7769 20.8929 16.3511L21.9505 17.4148C23.2908 16.0821 22.8775 13.8584 21.2415 12.9691L20.5251 14.2869ZM17.085 13.438C17.469 13.0562 18.0871 12.9616 18.6146 13.2483L19.331 11.9305C18.2474 11.3414 16.9026 11.5041 16.0273 12.3743L17.085 13.438Z" fill="currentColor"></path> </g></svg>
                    </span>
                </div>
                @error('customer_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <div class="relative">
                    <input wire:model.defer="customer_tazkira_id" type="text" class="input-field !pl-11" placeholder="آیدی تذکره (1234-5678-91234)" required>
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700">
                        <svg fill="currentColor" class="w-5 h-5" viewBox="0 -32 576 576" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M528 32H48C21.5 32 0 53.5 0 80v16h576V80c0-26.5-21.5-48-48-48zM0 432c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V128H0v304zm352-232c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H360c-4.4 0-8-3.6-8-8v-16zm0 64c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H360c-4.4 0-8-3.6-8-8v-16zm0 64c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H360c-4.4 0-8-3.6-8-8v-16zM176 192c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64 28.7-64 64-64zM67.1 396.2C75.5 370.5 99.6 352 128 352h8.2c12.3 5.1 25.7 8 39.8 8s27.6-2.9 39.8-8h8.2c28.4 0 52.5 18.5 60.9 44.2 3.2 9.9-5.2 19.8-15.6 19.8H82.7c-10.4 0-18.8-10-15.6-19.8z"></path></g></svg>
                    </span>
                </div>
                @error('customer_tazkira_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <div class="relative">
                    <input wire:model.defer="customer_address" type="text" class="input-field !pl-11" placeholder="آدرس" required>
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 22L2 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2 11L6.06296 7.74968M22 11L13.8741 4.49931C12.7784 3.62279 11.2216 3.62279 10.1259 4.49931L9.34398 5.12486" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15.5 5.5V3.5C15.5 3.22386 15.7239 3 16 3H18.5C18.7761 3 19 3.22386 19 3.5V8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M4 22V9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M20 9.5V13.5M20 22V17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M15 22V17C15 15.5858 15 14.8787 14.5607 14.4393C14.1213 14 13.4142 14 12 14C10.5858 14 9.87868 14 9.43934 14.4393M9 22V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 9.5C14 10.6046 13.1046 11.5 12 11.5C10.8954 11.5 10 10.6046 10 9.5C10 8.39543 10.8954 7.5 12 7.5C13.1046 7.5 14 8.39543 14 9.5Z" stroke="currentColor" stroke-width="1.5"></path> </g></svg>
                    </span>
                </div>
                @error('customer_address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="space-y-3">
                <h3 class="font-semibold text-blue-800">مشخصات دستگاه</h3>
                <div class="flex sm:hidden flex-col items-center gap-2 mb-2">
                    <label class="relative w-32 h-32 rounded-full border-2 border-dashed border-blue-500 bg-blue-50 overflow-hidden cursor-pointer group">
                        <input wire:model="device_image" id="device_image_mobile_{{ $formKey }}" type="file" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                        @if($device_image)
                            <img src="{{ $device_image->temporaryUrl() }}" alt="پیش نمایش عکس دستگاه" class="w-full h-full object-cover">
                            <span class="absolute inset-0 bg-black/35 text-white text-xs flex items-center justify-center opacity-0 group-hover:opacity-100 transition">تغییر عکس</span>
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center gap-1 text-blue-700 text-xs">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                    <rect x="7" y="2.5" width="10" height="19" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                    <circle cx="12" cy="18" r="1" fill="currentColor"/>
                                </svg>
                                <span>عکس دستگاه</span>
                            </div>
                        @endif
                        <span class="absolute left-1.5 bottom-1.5 w-6 h-6 rounded-full bg-white/95 text-blue-700 flex items-center justify-center border border-blue-200">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </label>
                    <span class="text-xs text-gray-600">برای انتخاب/تغییر عکس دستگاه کلیک کنید</span>
                    <span wire:loading wire:target="device_image" class="text-xs text-blue-700">در حال آپلود...</span>
                    @error('device_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="relative">
                    <select wire:model.defer="category" class="input-field !pl-11" required>
                        <option value="">کتگوری</option>
                        <option value="mobile">موبایل</option>
                        <option value="tablet">تبلت</option>
                        <option value="laptop">لپتاپ</option>
                    </select>
                </div>
                @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <div class="relative">
                    <input wire:model.defer="model" type="text" class="input-field !pl-11" placeholder="نام دستگاه" required>
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700">
                        <svg class="w-5 h-5" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>device-multiple</title> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> <rect width="48" height="48" fill="none"></rect> </g> <g id="icons_Q2" data-name="icons Q2"> <g> <path d="M42,23V41H34V23h8m2-4H32a2,2,0,0,0-2,2V43a2,2,0,0,0,2,2H44a2,2,0,0,0,2-2V21a2,2,0,0,0-2-2Z"></path> <path d="M38,7H7A2,2,0,0,0,5,9V31a2,2,0,0,0,2,2H26V29H9V11H36v4h4V9A2,2,0,0,0,38,7Z"></path> <path d="M26,37v4H4a2,2,0,0,1,0-4Z"></path> </g> </g> </g> </g></svg>
                    </span>
                </div>
                @error('model') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <div class="relative">
                    <input wire:model.defer="color" type="text" class="input-field !pl-11" placeholder="رنگ" required>
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700">
                        <svg class="w-5 h-5" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="currentColor" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M34.07,50.93S53.86,44.38,45.68,26.6c0,0-4.8-11.46-19.31-13.27S8.3,20.8,8.3,20.8,1.81,33.68,13.1,35c1.62.19,5-.56,6.4,1.33s.29,4.2,0,8.8C19.34,47.69,21.27,53.87,34.07,50.93Z" stroke-linecap="round"></path><circle cx="17.2" cy="24.01" r="3.59" stroke-linecap="round"></circle><circle cx="38.02" cy="28.02" r="2.43" stroke-linecap="round"></circle><circle cx="38.02" cy="39.04" r="2.43" stroke-linecap="round"></circle><circle cx="28.14" cy="44.38" r="2.43" stroke-linecap="round"></circle><path d="M54,12.62c-.69,3.31-2.07,10.9-2.18,27a.41.41,0,0,0,.41.41h4.91a.41.41,0,0,0,.41-.42c-.1-2.82-.74-18.12-2.75-27A.41.41,0,0,0,54,12.62Z" stroke-linecap="round"></path><path d="M57.48,43.8c0,1.53-1.92,7.37-2.78,7.37s-2.78-5.84-2.78-7.37a2.78,2.78,0,1,1,5.56,0Z" stroke-linecap="round"></path></g></svg>
                    </span>
                </div>
                @error('color') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <div class="relative">
                    <input wire:model.defer="imei" type="text" class="input-field !pl-11" placeholder="شماره IMEI" required>
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 8L8 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 8L12 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16 8L16 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M8.976 21C4.05476 21 3 19.9453 3 15.024" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path> <path d="M20.9999 15.024C20.9999 19.9453 19.9452 21 15.0239 21" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path> <path d="M15.0239 3C19.9452 3 20.9999 4.05476 20.9999 8.976" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path> <path d="M3 8.976C3 4.05476 4.05476 3 8.976 3" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path> </g></svg>
                    </span>
                </div>
                @error('imei') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-3">
                <div class="space-y-1">
                    <input wire:model="tazkira_image" id="tazkira_image_{{ $formKey }}" type="file" accept="image/*" required class="hidden">
                    <label for="tazkira_image_{{ $formKey }}" class="relative input-field !pl-11 !py-2 cursor-pointer flex items-center gap-2">
                        @if($tazkira_image)
                            <img src="{{ $tazkira_image->temporaryUrl() }}" alt="پیش نمایش تذکره" class="w-9 h-9 rounded object-cover border border-blue-200 shrink-0">
                        @endif
                        <span class="flex-1 min-w-0 truncate text-right text-gray-700">
                            @if($tazkira_image)
                                {{ $tazkira_image->getClientOriginalName() }}
                            @else
                                عکس تذکره
                            @endif
                        </span>
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="9" cy="9" r="2" stroke="currentColor" stroke-width="1.5"></circle> <path d="M13 15C13 16.1046 13 17 9 17C5 17 5 16.1046 5 15C5 13.8954 6.79086 13 9 13C11.2091 13 13 13.8954 13 15Z" stroke="currentColor" stroke-width="1.5"></path> <path d="M22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C21.298 5.64118 21.5794 6.2255 21.748 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 12H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 9H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 15H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                        </span>
                    </label>
                    <span wire:loading wire:target="tazkira_image" class="text-xs text-blue-700">در حال آپلود...</span>
                    @error('tazkira_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="space-y-1">
                    <input wire:model="carton_image" id="carton_image_{{ $formKey }}" type="file" accept="image/*" required class="hidden">
                    <label for="carton_image_{{ $formKey }}" class="relative input-field !pl-11 !py-2 cursor-pointer flex items-center gap-2">
                        @if($carton_image)
                            <img src="{{ $carton_image->temporaryUrl() }}" alt="پیش نمایش کارتن" class="w-9 h-9 rounded object-cover border border-blue-200 shrink-0">
                        @endif
                        <span class="flex-1 min-w-0  truncate text-right text-gray-700">
                            @if($carton_image)
                                {{ $carton_image->getClientOriginalName() }}
                            @else
                                عکس کارتن دستگاه
                            @endif
                        </span>
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-blue-700">
                            <svg fill="currentColor" class="w-5 h-5"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M475.318,331.733c-4.787,0-8.668,3.881-8.668,8.668v34.208L264.668,488.495V261.063L466.65,147.167v156.253 c-0.001,4.786,3.88,8.667,8.667,8.667c4.787,0,8.668-3.881,8.668-8.668V132.328c0-3.128-1.685-6.014-4.41-7.55L260.256,1.117 c-2.642-1.49-5.872-1.49-8.514,0L32.424,124.778c-2.725,1.537-4.41,4.422-4.41,7.55v247.344c0,3.128,1.685,6.014,4.41,7.55 l219.318,123.66c1.321,0.745,2.79,1.118,4.258,1.118c1.468,0,2.937-0.372,4.258-1.118l219.318-123.66 c2.725-1.537,4.41-4.422,4.41-7.55v-39.271C483.986,335.614,480.105,331.733,475.318,331.733z M255.999,18.618l55.014,31.019 l-132.779,74.865c-4.17,2.352-5.644,7.638-3.294,11.808c1.593,2.825,4.532,4.412,7.558,4.412c1.442,0,2.904-0.361,4.25-1.119 L328.66,59.588l50.203,28.307L177.196,201.612l-50.21-28.312l25.28-14.253c4.17-2.352,5.644-7.637,3.294-11.808 c-2.352-4.17-7.638-5.644-11.808-3.294l-34.413,19.403l-55.01-31.02L255.999,18.618z M247.331,488.494L45.349,374.608V147.166 l201.982,113.896V488.494z M255.999,246.048l-61.156-34.485L396.51,97.844l61.159,34.484L255.999,246.048z"></path> </g> </g> <g> <g> <path d="M393.763,256.674l-23.626-16.418c-2.006-1.394-4.507-1.876-6.887-1.329c-2.381,0.548-4.421,2.073-5.616,4.203 l-24.381,43.412c-2.344,4.173-0.861,9.457,3.313,11.801c1.342,0.753,2.799,1.112,4.237,1.112c3.033,0,5.975-1.594,7.565-4.425 l8.156-14.523v108.019c-0.003,4.789,3.877,8.67,8.664,8.67s8.668-3.881,8.668-8.668V263.952l10.013,6.957 c3.932,2.733,9.333,1.759,12.064-2.172C398.666,264.807,397.694,259.406,393.763,256.674z"></path> </g> </g> <g> <g> <path d="M173.495,259.946L74.69,204.232c-4.169-2.35-9.456-0.877-11.808,3.294c-2.351,4.17-0.876,9.456,3.294,11.808 l98.806,55.714c1.345,0.758,2.807,1.119,4.25,1.119c3.027,0,5.966-1.588,7.558-4.412 C179.14,267.584,177.666,262.298,173.495,259.946z"></path> </g> </g> <g> <g> <path d="M173.495,309.533l-25.407-14.326c-4.169-2.351-9.456-0.876-11.808,3.294c-2.351,4.17-0.877,9.456,3.294,11.808 l25.407,14.326c1.345,0.758,2.807,1.119,4.25,1.119c3.027,0,5.966-1.588,7.558-4.412 C179.14,317.17,177.665,311.884,173.495,309.533z"></path> </g> </g> <g> <g> <path d="M121.849,280.412l-47.16-26.593c-4.17-2.352-9.456-0.878-11.808,3.293c-2.351,4.17-0.877,9.456,3.294,11.807l47.16,26.593 c1.345,0.759,2.807,1.12,4.25,1.12c3.027,0,5.966-1.588,7.558-4.412C127.494,288.05,126.02,282.762,121.849,280.412z"></path> </g> </g> </g></svg>
                        </span>
                    </label>
                    <span wire:loading wire:target="carton_image" class="text-xs text-blue-700">در حال آپلود...</span>
                    @error('carton_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="lg:col-span-2 flex justify-between gap-3 pt-2">
                <button type="button" wire:click="cancel" class="p-3 w-full rounded-lg bg-red-900 hover:bg-red-700  text-white">لغو</button>
                <button type="submit" class="p-3 rounded-lg w-full bg-blue-900 hover:bg-blue-700  text-white">ارسال برای تایید مدیریت</button>
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
                        نکته: عکس‌ها را واضح، بدون لرزش و با نور متعادل ثبت کنید. صورت مشتری باید واضح و بدون عینک/لنز باشد.
                    </div>
                </div>
                <div class="px-5 py-4 bg-gray-50 flex justify-end">
                    <button wire:click="closeAiModal" class="px-4 py-2 rounded-lg bg-blue-700 text-white hover:bg-blue-800">متوجه شدم</button>
                </div>
            </div>
        </div>
    @endif
</div>
