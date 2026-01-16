
<div class="p-3 ">
    <div class="grid grid-cols-1 max-w-full mx-auto sm:grid-cols-1  lg:grid-cols-4 gap-4 mb-4 ">
        <div class="bg-[#0948EE]/20 rounded-2xl  border-r-[2px] card-anim border-[#0B35CC] shadow-xl shadow-[0px_4px_4px_0px_#00000040] p-4 ">
            <div class="flex  justify-between items-center mb-1">
                <span class="text-sm text-gray-600 mb-6">   برداشت امروز</span>
                <i class="bi bi-cash text-blue-600 text-xl mb-6 rounded-full bg-[#0B35CC]/20 w-8 h-8">
                <svg class="w-6 h-6 m-auto mt-1"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 11.4002C8 12.1702 8.6 12.8002 9.33 12.8002H10.83C11.47 12.8002 11.99 12.2502 11.99 11.5802C11.99 10.8502 11.67 10.5902 11.2 10.4202L8.8 9.5802C8.32 9.4102 8 9.1502 8 8.4202C8 7.7502 8.52 7.2002 9.16 7.2002H10.66C11.4 7.2102 12 7.8302 12 8.6002" stroke="#0B35CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 12.8496V13.5896" stroke="#0B35CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 6.41016V7.19016" stroke="#0B35CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.99 17.98C14.4028 17.98 17.98 14.4028 17.98 9.99C17.98 5.57724 14.4028 2 9.99 2C5.57724 2 2 5.57724 2 9.99C2 14.4028 5.57724 17.98 9.99 17.98Z" stroke="#0B35CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.98 19.88C13.88 21.15 15.35 21.98 17.03 21.98C19.76 21.98 21.98 19.76 21.98 17.03C21.98 15.37 21.16 13.9 19.91 13" stroke="#0B35CC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                </i>
            </div>
            <div class="flex justify-between items-center mb-1">
                <p class="font-bold text-lg text-gray-800 inline-flex items-center">
                <span>{{ number_format($todayTotal) }}</span>
                <span class="ml-1">؋</span>
                </p>
            <div class=""><p class=" text-[12px] text-[#0B35CC] text-center rounded-md bg-[#0B35CC]/20 w-8">25%</p> </div>
            </div>
        </div>
        <div class="bg-[#0099FF]/10 rounded-2xl  border-r-[2px] card-anim border-[#0099FF] shadow-xl shadow-[0px_4px_4px_0px_#00000040] p-4  w-full max-w-full">
            <div class="flex justify-between items-center mb-1">
                <span class="text-sm text-gray-600 mb-6">    برداشت این هفته</span>
                <i class="bi bi-clipboard-data text-purple-600 text-xl mb-6 bg-blue-300 w-8 h-8 rounded-full">
                    <svg class="w-6 h-6 m-auto mt-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.16989 15.2998L8.69989 19.8298C10.5599 21.6898 13.5799 21.6898 15.4499 19.8298L19.8399 15.4398C21.6999 13.5798 21.6999 10.5598 19.8399 8.6898L15.2999 4.1698C14.3499 3.2198 13.0399 2.7098 11.6999 2.7798L6.69989 3.0198C4.69989 3.1098 3.10989 4.6998 3.00989 6.6898L2.76989 11.6898C2.70989 13.0398 3.21989 14.3498 4.16989 15.2998Z" stroke="#0099FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.5 12C10.8807 12 12 10.8807 12 9.5C12 8.11929 10.8807 7 9.5 7C8.11929 7 7 8.11929 7 9.5C7 10.8807 8.11929 12 9.5 12Z" stroke="#0099FF" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </i>
            </div>
            <div class="flex justify-between items-center mb-1">
                <p class="font-bold text-lg text-gray-800 inline-flex items-center">
                <span>{{ number_format($weekTotal) }}</span>
                <span class="ml-1">؋</span>
                </p>
            <p class="text-[12px] text-[#0099FF]  text-center rounded-md bg-blue-300 w-8">25%</p>
            </div>
        </div>
        <div class="bg-[#31009B]/10 rounded-2xl shadow-xl shadow-[0px_4px_4px_0px_#00000040]  p-4 border-r-[2px] card-anim      border-[#31009B] w-full max-w-full">
            <div class="flex justify-between items-center mb-1">
                <span class="text-sm text-gray-600 mb-6">    برداشت این ماه</span>
                <i class="bi bi-journal-check text-blue-700 text-xl mb-6 bg-[#31009B]/20 w-8 h-8 rounded-full">
                    <svg class="w-6 h-6 m-auto mt-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7.04V16.96C20 18.48 19.86 19.56 19.5 20.33C19.5 20.34 19.49 20.36 19.48 20.37C19.26 20.65 18.97 20.79 18.63 20.79C18.1 20.79 17.46 20.44 16.77 19.7C15.95 18.82 14.69 18.89 13.97 19.85L12.96 21.19C12.56 21.73 12.03 22 11.5 22C10.97 22 10.44 21.73 10.04 21.19L9.02002 19.84C8.31002 18.89 7.05999 18.82 6.23999 19.69L6.22998 19.7C5.09998 20.91 4.10002 21.09 3.52002 20.37C3.51002 20.36 3.5 20.34 3.5 20.33C3.14 19.56 3 18.48 3 16.96V7.04C3 5.52 3.14 4.44 3.5 3.67C3.5 3.66 3.50002 3.65 3.52002 3.64C4.09002 2.91 5.09998 3.09 6.22998 4.3L6.23999 4.31C7.05999 5.18 8.31002 5.11 9.02002 4.16L10.04 2.81C10.44 2.27 10.97 2 11.5 2C12.03 2 12.56 2.27 12.96 2.81L13.97 4.15C14.69 5.11 15.95 5.18 16.77 4.3C17.46 3.56 18.1 3.21 18.63 3.21C18.97 3.21 19.26 3.36 19.48 3.64C19.5 3.65 19.5 3.66 19.5 3.67C19.86 4.44 20 5.52 20 7.04Z" stroke="#31009B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8 10.25H16" stroke="#31009B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8 13.75H14" stroke="#31009B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </i>
            </div>
            <div class="flex justify-between items-center mb-1">
                <p class="font-bold text-lg text-gray-800 inline-flex items-center">
                <span>{{ number_format($monthTotal) }}</span>
                <span class="ml-1">؋</span>
                </p>
            <p class=" text-[12px]  text-center rounded-md text-[#31009B] bg-[#31009B]/20 w-8 ">25%</p>
            </div>
        </div>
        <div class="bg-[#3A64D0]/10 rounded-2xl shadow-xl shadow-[0px_4px_4px_0px_#00000040] p-4 border-r-[2px] card-anim      border-[#3A64D0] w-full max-w-full">
            <div class="flex justify-between items-center mb-1">
                <span class="text-sm text-gray-600 mb-6"> برداشت کل  </span>
                <i class="bi bi-people text-indigo-700 text-xl mb-6 bg-[#3A64D0]/40 w-8 h-8 rounded-full">
                    <svg class="w-6 h-6 m-auto mt-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#3A64D0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.75 9H8.25" stroke="#3A64D0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.75 15H8.25" stroke="#3A64D0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </i>
            </div>
            <div class="flex justify-between items-center mb-1">
                <p class="font-bold text-lg text-gray-800 inline-flex items-center">
                <span>{{ number_format($monthTotal) }}</span>
                <span class="ml-1">؋</span>
                </p>
                <p class=" text-[12px]  text-center rounded-md text-[#3A64D0] bg-[#3A64D0]/40 w-8">25%</p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 max-w-full mx-auto lg:grid-cols-3 gap-3">
        <form wire:submit.prevent="save" class="h-full mb-6 space-y-2">
            <div class="bg-[#616161]/5  rounded-2xl shadow-xl shadow-[0px_4px_4px_0px_#00000040] border border-gray-200 w-full lg:max-w-full p-3">
                <div class="flex justify-between mb-2 shadow p-3 rounded-xl border border-black">
                    <div class="flex gap-2 mt-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.99609 8.5H11.4961" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.99609 16.5H7.99609" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.4961 16.5H14.4961" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21.9961 12.03V16.11C21.9961 19.62 21.1061 20.5 17.5561 20.5H6.43609C2.88609 20.5 1.99609 19.62 1.99609 16.11V7.89C1.99609 4.38 2.88609 3.5 6.43609 3.5H14.4961" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.0764 4.13031L15.3664 7.84031C15.2264 7.98031 15.0864 8.26031 15.0564 8.46031L14.8564 9.88031C14.7864 10.3903 15.1464 10.7503 15.6564 10.6803L17.0764 10.4803C17.2764 10.4503 17.5564 10.3103 17.6964 10.1703L21.4064 6.46031C22.0464 5.82031 22.3464 5.08031 21.4064 4.14031C20.4564 3.19031 19.7164 3.49031 19.0764 4.13031Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.5459 4.66016C18.8659 5.79016 19.7459 6.67016 20.8659 6.98016" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h2 class="text-bold text-[15px]">فورم ثبت برداشت از صندوق</h2>
                    </div>
                </div>
                <div class="flex  flex-col">
                    <select wire:model="withdrawal_type" class="w-full rounded-xl border border-gray-900 p-4 box-border text-sm mb-3 ">
                        <option  value="" class="bg-gray-100">نوع برداشت</option>
                        <option  value="کرایه" class="bg-gray-100">کرایه</option>
                        <option  value="مصارف" class="bg-gray-100">مصارف</option>
                        <option  value="معاش" class="bg-gray-100">معاش</option>
                        <option  value="تعمیرکاری" class="bg-gray-100">تعمیرکاری</option>
                    </select>
                    @error('withdrawal_type')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-3">
                    <div class="flex flex-col">
                        <div class="border box-border rounded-xl p-4 border-gray-900 flex items-center gap-2">
                            <input wire:model.defer="amount" type="number" placeholder="مبلغ" class="w-full bg-transparent focus:outline-none text-sm">
                            <i>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_974_3657)">
                                        <path d="M7.22656 11.9412C7.22656 13.0162 8.05156 13.8829 9.07656 13.8829H11.1682C12.0599 13.8829 12.7849 13.1245 12.7849 12.1912C12.7849 11.1745 12.3432 10.8162 11.6849 10.5829L8.32656 9.41621C7.66823 9.18288 7.22656 8.82454 7.22656 7.80788C7.22656 6.87454 7.95156 6.11621 8.84323 6.11621H10.9349C11.9599 6.11621 12.7849 6.98288 12.7849 8.05788" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 5V15" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.99984 18.3337C14.6022 18.3337 18.3332 14.6027 18.3332 10.0003C18.3332 5.39795 14.6022 1.66699 9.99984 1.66699C5.39746 1.66699 1.6665 5.39795 1.6665 10.0003C1.6665 14.6027 5.39746 18.3337 9.99984 18.3337Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_974_3657">
                                            <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </i>
                        </div>
                        @error('amount')
                            <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <div class="border  box-border rounded-xl p-4 border-gray-900 flex items-center gap-2">
                            <input  type="text"  id="withdrawal_date" wire:ignore   class="w-full bg-transparent focus:outline-none text-[15px]" placeholder="تاریخ">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentcolor" d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z"/><path fill="currentColor" fill-rule="evenodd" d="M22 12c0-.839 0-1.585-.013-2.25H2.013C2 10.415 2 11.161 2 12v2c0 3.771 0 5.657 1.172 6.828S6.229 22 10 22h4c3.771 0 5.657 0 6.828-1.172S22 17.771 22 14zm-8 .25A1.75 1.75 0 0 0 12.25 14v2a1.75 1.75 0 1 0 3.5 0v-2A1.75 1.75 0 0 0 14 12.25m0 1.5a.25.25 0 0 0-.25.25v2a.25.25 0 1 0 .5 0v-2a.25.25 0 0 0-.25-.25m-3.213-1.443a.75.75 0 0 1 .463.693v4a.75.75 0 0 1-1.5 0v-2.19l-.22.22a.75.75 0 0 1-1.06-1.06l1.5-1.5a.75.75 0 0 1 .817-.163" clip-rule="evenodd"/></svg>
                            </i>
                        </div>
                    </div>
                </div>
                <textarea wire:model="description" class="w-full rounded-xl border  border-gray-900 p-2 text-sm h-28 " placeholder="توضیحات..."></textarea>
                @error('description')
                    <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                @enderror
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-4">
                    <button type="button" wire:click.prevent="resetForm" class="bg-red-600 hover:bg-red-700 text-white rounded-xl py-3 text-sm">انصراف</button>
                    <button type="submit" class="btn btn-primary bg-blue-600 hover:bg-blue-700 text-white rounded-xl py-3 text-sm">{{ $editing ? 'ویرایش برداشت' : 'ثبت برداشت' }}</button>
                </div>
                @if($successMessage)
                    <div class="bg-green-100 text-green-700 p-2 my-4 rounded-xl">
                        {{ $successMessage }}
                    </div>
                @endif
            </div>
        </form>
        <div class="lg:col-span-2 bg-[#616161]/5  rounded-2xl shadow-[0_4px_12px] shadow-lg border border-gray-200 w-full lg:max-w-full p-3">
            <div class="lg:hidden space-y-3 ">
                <div class="flex justify-between items-center mb-3 flex-wrap gap-2">
                    <div class="flex items-center gap-1 flex-shrink-0">
                        <i>
                            <svg width="20" height="20" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1047_2670)">
                            <path d="M34.4314 16.596L32.8736 23.2407C31.5383 28.9792 28.8995 31.3001 23.9398 30.8232C23.145 30.7596 22.2866 30.6166 21.3646 30.394L18.694 29.7582C12.0652 28.1844 10.0146 24.9098 11.5725 18.2651L13.1303 11.6045C13.4482 10.2533 13.8297 9.07698 14.3066 8.1073C16.1665 4.26038 19.3299 3.22712 24.6393 4.48293L27.294 5.10289C33.9545 6.66073 35.9893 9.95128 34.4314 16.596Z" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.9399 30.8233C22.9543 31.491 21.7144 32.0474 20.2043 32.5401L17.6926 33.3668C11.3818 35.4015 8.05944 33.7006 6.00881 27.3897L3.97408 21.1107C1.93934 14.7998 3.62436 11.4616 9.93522 9.42682L12.4468 8.60021C13.0986 8.39356 13.7186 8.2187 14.3067 8.10742C13.8298 9.0771 13.4483 10.2534 13.1304 11.6046L11.5725 18.2652C10.0147 24.9099 12.0653 28.1845 18.6941 29.7583L21.3647 30.3941C22.2867 30.6167 23.1451 30.7598 23.9399 30.8233Z" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.093 13.5596L27.8028 15.5148" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.5352 19.7119L23.1451 20.8882" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_1047_2670">
                            <rect width="38.1513" height="38.1513" fill="white"/>
                            </clipPath>
                            </defs>
                            </svg>
                        </i>
                        <h2 class="font-bold text-lg mb-0">لیست برداشت ها:</h2>
                    </div>
                    <div class="flex gap-2 flex-1 min-w-[100px]">
                        <div
                            class="flex flex-row justify-center rounded-md md:rounded-xl  bg-[#0948EE]/20   gap-1  items-center px-1 md:px-3 ">
                            <span class="block md:hidden">
                                <svg width="10" height="10" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_464_1127)">
                                        <path d="M10.73 12.424V6.21191" stroke="#292D32" stroke-width="1.5"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10.73 3.95309V1.12939" stroke="#292D32" stroke-width="1.5"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M6.77686 12.4243V9.60059" stroke="#292D32" stroke-width="1.5"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M6.77686 7.34153V1.12939" stroke="#292D32" stroke-width="1.5"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2.82373 12.424V6.21191" stroke="#292D32" stroke-width="1.5"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2.82373 3.95309V1.12939" stroke="#292D32" stroke-width="1.5"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1.69434 6.21191H3.95329" stroke="#292D32" stroke-width="1.5"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.60059 6.21191H11.8595" stroke="#292D32" stroke-width="1.5"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.64746 7.3418H7.90642" stroke="#292D32" stroke-width="1.5"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_464_1127">
                                            <rect width="13.5537" height="13.5537" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                            <select
                                wire:model.live="filterType"
                                class=" bg-transparent py-1 text-[9px] md:text-sm">
                                <option value="">همه </option>
                                <option value="کرایه">کرایه</option>
                                <option value="مصارف">مصارف</option>
                                <option value="معاش">معاش </option>
                                <option value="تعمیرکاری">تعمیرکاری </option>
                            </select>
                        </div>
                        <button onclick="window.print()"
                            class="flex flex-row justify-center rounded-md md:rounded-xl  bg-[#0948EE]/20   gap-1  items-center px-1 md:px-3 ">
                            <span >
                                <svg width="12" height="12" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.21191 11.0122H11.8593" stroke="#292D32" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.21191 7.05908H11.8593" stroke="#292D32" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.21191 3.10596H11.8593" stroke="#292D32" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1.69434 3.10604L2.25908 3.67078L3.95329 1.97656" stroke="#292D32"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1.69434 7.05917L2.25908 7.62391L3.95329 5.92969" stroke="#292D32"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1.69434 11.0123L2.25908 11.577L3.95329 9.88281" stroke="#292D32"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="text-[10px] md:text-[10px]">
                                چاپ کردن
                            </span>
                        </button>
                    </div>
                </div>
                <div>
                    <div class="print-area  md:hidden flex flex-col gap-2 w-full">
                        <div class="rounded-2xl flex flex-col items-center mt-2 border border-[#0948EE] h-auto w-full my-4">
                            <table dir="ltr" class="w-full table-fixed items-center font-semibold justify-center text-center mx-auto">
                                @foreach($withdrawals as $withdrawal)
                                <tbody class="{{ !$loop->last ? 'border-b border-[#0948EE]' : '' }}">
                                    <tr>
                                        <th class="pt-2 text-[13px]">مبلغ</th>
                                        <th class="pt-2 text-[13px]">نوع برداشت</th>
                                    </tr>
                                    <tr class="text-[#00000080]">
                                        <td  class="text-[10px]">{{ $withdrawal->amount}}</td>
                                        <td  class="text-[10px]">{{ $withdrawal->withdrawal_type }}</td>
                                    </tr>
                                    <tr>
                                        <th class="pt-2 text-[13px]">توضیحات</th>
                                        <th class="pt-2 text-[13px]">تاریخ</th>
                                    </tr>
                                    <tr class="text-[#00000080]">
                                        <td  class="text-[10px] pb-4">{{ $withdrawal->description}}</td>
                                        <td  class="text-[10px] pb-4">{{ $withdrawal->withdrawal_date }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button wire:click="edit({{ $withdrawal->id }})">
                                                <svg width="20" class="mr-8" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#0948EE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </td>
                                        <td>
                                            <button wire:click="delete({{ $withdrawal->id }})"
                                            onclick="return confirm('حذف شود؟')">
                                                <svg width="20" class="mr-8" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M18.8499 9.14001L18.1999 19.21C18.0899 20.78 17.9999 22 15.2099 22H8.7899C5.9999 22 5.9099 20.78 5.7999 19.21L5.1499 9.14001" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10.3301 16.5H13.6601" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M9.5 12.5H14.5" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block overflow-x-auto ">
                <div class="flex justify-between mb-3">
                    <div class="flex gap-1 items-center">
                        <i>
                        <svg width="25" height="25" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1047_2670)">
                        <path d="M34.4314 16.596L32.8736 23.2407C31.5383 28.9792 28.8995 31.3001 23.9398 30.8232C23.145 30.7596 22.2866 30.6166 21.3646 30.394L18.694 29.7582C12.0652 28.1844 10.0146 24.9098 11.5725 18.2651L13.1303 11.6045C13.4482 10.2533 13.8297 9.07698 14.3066 8.1073C16.1665 4.26038 19.3299 3.22712 24.6393 4.48293L27.294 5.10289C33.9545 6.66073 35.9893 9.95128 34.4314 16.596Z" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M23.9399 30.8233C22.9543 31.491 21.7144 32.0474 20.2043 32.5401L17.6926 33.3668C11.3818 35.4015 8.05944 33.7006 6.00881 27.3897L3.97408 21.1107C1.93934 14.7998 3.62436 11.4616 9.93522 9.42682L12.4468 8.60021C13.0986 8.39356 13.7186 8.2187 14.3067 8.10742C13.8298 9.0771 13.4483 10.2534 13.1304 11.6046L11.5725 18.2652C10.0147 24.9099 12.0653 28.1845 18.6941 29.7583L21.3647 30.3941C22.2867 30.6167 23.1451 30.7598 23.9399 30.8233Z" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20.093 13.5596L27.8028 15.5148" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.5352 19.7119L23.1451 20.8882" stroke="#0948EE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1047_2670">
                        <rect width="38.1513" height="38.1513" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>
                        </i>
                        <h2 class="font-bold text-[14px] mb-0">  لیست برداشت ها  :</h2>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-1">
                        <div class="relative mb-1 flex flex-row justify-center rounded-md md:rounded-xl bg-[#0948EE]/20  gap-1  items-center px-2 md:px-3 ">
                            <span class="absolute right-2 top-1.5 mt-1">
                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1047_2643)">
                                <path d="M10.2915 12.8337V6.41699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10.2915 4.08366V1.16699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.5 12.8337V9.91699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.5 7.58366V1.16699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.7085 12.8337V6.41699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.7085 4.08366V1.16699" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1.625 6.41699H3.79167" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.2085 6.41699H11.3752" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5.4165 7.58301H7.58317" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_1047_2643">
                                <rect width="13" height="14" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>
                            </span>
                            <select
                                wire:model.live="filterType"
                                class=" bg-transparent py-1 text-sm pr-4">
                                <option value="">همه </option>
                                <option value="کرایه">   کرایه </option>
                                <option value="مصارف"> مصارف </option>
                                <option value="معاش">  معاش  </option>
                                <option value="تعمیرکاری">  تعمیرکاری  </option>
                            </select>
                        </div>
                        <button onclick="window.print()"
                            class="flex flex-row justify-center rounded-md md:rounded-xl bg-[#0948EE]/20  gap-1  items-center px-1 md:px-3 ">
                            <span class="block md:hidden">
                                <svg width="10" height="10" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.21191 11.0122H11.8593" stroke="#292D32" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.21191 7.05908H11.8593" stroke="#292D32" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.21191 3.10596H11.8593" stroke="#292D32" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1.69434 3.10604L2.25908 3.67078L3.95329 1.97656" stroke="#292D32"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1.69434 7.05917L2.25908 7.62391L3.95329 5.92969" stroke="#292D32"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1.69434 11.0123L2.25908 11.577L3.95329 9.88281" stroke="#292D32"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="hidden md:block">
                                <svg width="17" height="17" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.0415 5.83317H13.9582V4.1665C13.9582 2.49984 13.3332 1.6665 11.4582 1.6665H8.5415C6.6665 1.6665 6.0415 2.49984 6.0415 4.1665V5.83317Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.3332 12.5V15.8333C13.3332 17.5 12.4998 18.3333 10.8332 18.3333H9.1665C7.49984 18.3333 6.6665 17.5 6.6665 15.8333V12.5H13.3332Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.5 8.3335V12.5002C17.5 14.1668 16.6667 15.0002 15 15.0002H13.3333V12.5002H6.66667V15.0002H5C3.33333 15.0002 2.5 14.1668 2.5 12.5002V8.3335C2.5 6.66683 3.33333 5.8335 5 5.8335H15C16.6667 5.8335 17.5 6.66683 17.5 8.3335Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.1668 12.5H13.1585H5.8335" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.8335 9.1665H8.3335" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="text-[10px] md:text-[10px]">
                                چاپ کردن
                            </span>
                        </button>
                        <div class="relative mb-1">
                            <input type="text"  wire:model.live="search"  class="p-2 w-[100px]  bg-[#0948EE]/20 text-[13px]  rounded-xl" placeholder="جستجو....">
                            <span class="absolute left-1 mt-1 top-1.5 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <table class="w-full text-center  border-2 border-[#0948EE] text-sm border-collapse">
                    <thead class="bg-[#0948EE] text-white">
                        <tr>
                            <th class="p-2 text-[12px]">شماره</th>
                            <th class="p-2 text-[12px]"> نوع برداشت</th>
                            <th class="p-2 text-[12px]">تاریخ</th>
                            <th class="p-2 text-[12px]">مبلغ</th>
                            <th class="p-2 text-[12px]">توضیحات</th>
                            <th class="p-2 text-[12px]">ویرایش</th>
                            <th class="p-2 text-[12px]">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($withdrawals as $withdrawal)
                        <tr class="hover:bg-gray-200 text-[11px]  border-b-2 border-[#0948EE]">
                            <td class="p-2"> {{ $counter++ }}</td>
                            <td class="p-2"> {{$withdrawal->withdrawal_type}} </td>
                            <td class="p-2"> {{ \Morilog\Jalali\Jalalian::fromDateTime($withdrawal->withdrawal_date)->format('Y/m/d') }} </td>
                            <td class="p-2"> {{$withdrawal->amount}} </td>
                            <td class="p-2"> {{$withdrawal->description}} </td>
                            <td class="p-2 text-center ">
                                <button wire:click="edit({{ $withdrawal->id }})" class="flex justify-center ">
                                    <svg width="20" class="mr-8" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#0948EE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </td>
                            <td class="p-2 text-center">
                                <button class="flex justify-center" wire:click="delete({{ $withdrawal->id }})" onclick="return confirm('حذف شود؟')">
                                    <svg width="20" class="mr-8" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M18.8499 9.14001L18.1999 19.21C18.0899 20.78 17.9999 22 15.2099 22H8.7899C5.9999 22 5.9099 20.78 5.7999 19.21L5.1499 9.14001" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.3301 16.5H13.6601" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.5 12.5H14.5" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                <button wire:click="previousPage" @disabled($withdrawals->onFirstPage())   class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white disabled:opacity-50"  >
                    ‹
                </button>
                @foreach ($withdrawals->links()->elements[0] as $page => $url)
                    <button wire:click="gotoPage({{ $page }})"  @class([  'w-7 h-7 rounded-md border text-xs font-medium', 'border-blue-500 bg-[#0948EE]/60 text-white' => $withdrawals->currentPage() == $page, 'border-transparent bg-[#0948EE]/60 text-white' => $withdrawals->currentPage() != $page,  ]) >
                        {{ $page }}
                    </button>
                @endforeach
                <button wire:click="nextPage" @disabled($withdrawals->onLastPage()) class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white disabled:opacity-50">
                    ›
                </button>
            </div>
        </div>
    </div>
</div>
