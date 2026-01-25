
<div class="p-3 ">
    <div class="grid grid-cols-1 max-w-full mx-auto sm:grid-cols-1  lg:grid-cols-4 gap-4 mb-4 ">
        <div class="text-[#0746F7] h-auto card-anim shadow-xl shadow-[0px_4px_4px_0px_#00000040] md:w-full rounded-xl  border-r-[2px]  border-[#0746F7] bg-[#0746F7]/10 ">
            <div class="flex flex-row gap-4 w-full p-2 mx-auto justify-between">
                <span class="text-[15px] font-semibold"> برداشت کل  </span>
                <i class="bi bi-people  mb-6 bg-[#0746F7] w-8 h-8 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-finance w-6 h-6 m-auto mt-1" viewBox="0 -960 960 960"  fill="none"><path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z"/></svg>
                </i>
            </div>
            <div class="flex flex-col items-center justify-center gap-2 w-full p-2 mx-auto">
                <p class="text-[16px] md:text-[24px] font-semibold">
                <span>{{ number_format($monthTotal) }}</span>
                <span class="ml-1">؋</span>
                </p>
                <p class="text-[14px] md:text-[13px] font-sm -mt-3">
                      مقدار برداشت کل
                </p>
            </div>
        </div>
        <div class="text-[#31009B] card-anim  shadow-xl shadow-[0px_4px_4px_0px_#00000040] h-auto  md:w-full rounded-xl  border-r-[2px]     border-[#31009B] bg-[#31009B]/10 " >
            <div class="flex flex-row gap-4 w-full p-2 mx-auto justify-between">
                <span class="text-[15px] font-semibold">   برداشت امروز</span>
                <i class="bi bi-cash  mb-6 rounded-full bg-[#31009B] w-8 h-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon-finance w-6 h-6 m-auto mt-1" viewBox="0 -960 960 960"  fill="none"><path d="M336-120q-91 0-153.5-62.5T120-336q0-38 13-74t37-65l142-171-97-194h530l-97 194 142 171q24 29 37 65t13 74q0 91-63 153.5T624-120H336Zm144-200q-33 0-56.5-23.5T400-400q0-33 23.5-56.5T480-480q33 0 56.5 23.5T560-400q0 33-23.5 56.5T480-320Zm-95-360h190l40-80H345l40 80Zm-49 480h288q57 0 96.5-39.5T760-336q0-24-8.5-46.5T728-423L581-600H380L232-424q-15 18-23.5 41t-8.5 47q0 57 39.5 96.5T336-200Z"/></svg>
                </i>
            </div>
            <div class="flex flex-col items-center justify-center gap-2 w-full p-2 mx-auto">
                <p class="text-[16px] md:text-[24px] font-semibold">
                <span>{{ number_format($todayTotal) }}</span>
                <span class="ml-1">؋</span>
                </p>
                <p class="text-[14px] md:text-[13px] font-sm -mt-3">
                      مقدار برداشت امروز
                </p>
            </div>
        </div>
        <div class="text-[#0014AE] h-auto card-anim shadow-xl shadow-[0px_4px_4px_0px_#00000040]  md:w-full rounded-xl  border-r-[2px]   border-[#0014AE] bg-[#0014AE]/10 ">
            <div class="flex flex-row gap-4 w-full p-2 mx-auto justify-between">
                <span class="text-[15px] font-semibold">    برداشت این هفته</span>
                <i class="bi bi-clipboard-data text-purple-600 text-xl mb-6 bg-[#0014AE] w-8 h-8 rounded-full">
                    <svg class="w-6 h-6 m-auto mt-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.16989 15.2998L8.69989 19.8298C10.5599 21.6898 13.5799 21.6898 15.4499 19.8298L19.8399 15.4398C21.6999 13.5798 21.6999 10.5598 19.8399 8.6898L15.2999 4.1698C14.3499 3.2198 13.0399 2.7098 11.6999 2.7798L6.69989 3.0198C4.69989 3.1098 3.10989 4.6998 3.00989 6.6898L2.76989 11.6898C2.70989 13.0398 3.21989 14.3498 4.16989 15.2998Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.5 12C10.8807 12 12 10.8807 12 9.5C12 8.11929 10.8807 7 9.5 7C8.11929 7 7 8.11929 7 9.5C7 10.8807 8.11929 12 9.5 12Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </i>
            </div>
            <div class="flex flex-col items-center justify-center gap-2 w-full p-2 mx-auto">
                <p class="text-[16px] md:text-[24px] font-semibold">
                <span>{{ number_format($weekTotal) }}</span>
                <span class="ml-1">؋</span>
                </p>
                <p class="text-[14px] md:text-[13px] font-sm -mt-3">
                      مقدار برداشت این هفته
                </p>
            </div>
        </div>
        <div class="text-[#5100FF] h-auto shadow-xl shadow-[0px_4px_4px_0px_#00000040] card-anim  md:w-full rounded-xl border-r-[2px]  border-[#5100FF] bg-[#5100FF]/10 ">
            <div class="flex flex-row gap-4 w-full p-2 mx-auto justify-between">
                <span class="text-[15px] font-semibold">    برداشت این ماه</span>
                <i class="bi bi-journal-check text-blue-700 text-xl mb-6 bg-[#5100FF] w-8 h-8 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-finance w-6 h-6 m-auto mt-1" viewBox="0 -960 960 960"  fill="none"><path d="M321-240h120v-40h-80v-40h80v-120H321v40h80v40h-80v120Zm280 0h40v-200h-40v80h-40v-80h-40v120h80v80Zm240-278v318q0 33-23.5 56.5T761-120H201q-33 0-56.5-23.5T121-200v-318q-23-21-35.5-54t-.5-72l42-136q8-26 28.5-43t47.5-17h556q27 0 47 16.5t29 43.5l42 136q12 39-.5 71T841-518Zm-272-42q27 0 41-18.5t11-41.5l-22-140h-78v148q0 21 14 36.5t34 15.5Zm-180 0q23 0 37.5-15.5T441-612v-148h-78l-22 140q-4 24 10.5 42t37.5 18Zm-178 0q18 0 31.5-13t16.5-33l22-154h-78l-40 134q-6 20 6.5 43t41.5 23Zm540 0q29 0 42-23t6-43l-42-134h-76l22 154q3 20 16.5 33t31.5 13ZM201-200h560v-282q-5 2-6.5 2H751q-27 0-47.5-9T663-518q-18 18-41 28t-49 10q-27 0-50.5-10T481-518q-17 18-39.5 28T393-480q-29 0-52.5-10T299-518q-21 21-41.5 29.5T211-480h-4.5q-2.5 0-5.5-2v282Zm560 0H201h560Z"/></svg>
                </i>
            </div>
            <div class="flex flex-col items-center justify-center gap-2 w-full p-2 mx-auto">
                <p class="text-[16px] md:text-[24px] font-semibold">
                <span>{{ number_format($monthTotal) }}</span>
                <span class="ml-1">؋</span>
                </p>
                <p class="text-[14px] md:text-[13px] font-sm -mt-3">
                      مقدار برداشت این ماه
                </p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 max-w-full mx-auto lg:grid-cols-3 gap-3">
        <form wire:submit.prevent="save" class="h-full  mb-6 space-y-2">
            <div class=" rounded-2xl shadow-xl border  border-gray-300 shadow-[0px_4px_4px_0px_#00000040] border border-gray-200 w-full lg:max-w-full p-3">
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
                            <input type="text" id="withdrawal_date" wire:model.defer="withdrawal_date" readonly  class="w-full bg-transparent focus:outline-none text-[15px]" placeholder="تاریخ">
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
                    <button type="button" wire:click.prevent="resetForm" class="bg-red-800 hover:bg-red-700 text-white rounded-xl py-3 text-sm">انصراف</button>
                    <button type="submit" class="btn btn-primary bg-blue-800 hover:bg-blue-700 text-white rounded-xl py-3 text-sm">{{ $editing ? 'ویرایش برداشت' : 'ثبت برداشت' }}</button>
                </div>
                @if($successMessage)
                    <div class="bg-green-100 text-green-700 p-2 my-4 rounded-xl">
                        {{ $successMessage }}
                    </div>
                @endif
            </div>
        </form>
        <div class="lg:col-span-2 border  border-gray-300 rounded-2xl shadow-[0_4px_12px] shadow-lg border border-gray-200 w-full lg:max-w-full p-3">
            <div class="lg:hidden space-y-3 ">
                <div class="flex justify-between items-center mb-3 flex-wrap gap-2">
                    <div class="flex items-center gap-1 flex-shrink-0">
                        <i>
                            <svg width="20" height="20" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1047_2670)">
                            <path d="M34.4314 16.596L32.8736 23.2407C31.5383 28.9792 28.8995 31.3001 23.9398 30.8232C23.145 30.7596 22.2866 30.6166 21.3646 30.394L18.694 29.7582C12.0652 28.1844 10.0146 24.9098 11.5725 18.2651L13.1303 11.6045C13.4482 10.2533 13.8297 9.07698 14.3066 8.1073C16.1665 4.26038 19.3299 3.22712 24.6393 4.48293L27.294 5.10289C33.9545 6.66073 35.9893 9.95128 34.4314 16.596Z" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.9399 30.8233C22.9543 31.491 21.7144 32.0474 20.2043 32.5401L17.6926 33.3668C11.3818 35.4015 8.05944 33.7006 6.00881 27.3897L3.97408 21.1107C1.93934 14.7998 3.62436 11.4616 9.93522 9.42682L12.4468 8.60021C13.0986 8.39356 13.7186 8.2187 14.3067 8.10742C13.8298 9.0771 13.4483 10.2534 13.1304 11.6046L11.5725 18.2652C10.0147 24.9099 12.0653 28.1845 18.6941 29.7583L21.3647 30.3941C22.2867 30.6167 23.1451 30.7598 23.9399 30.8233Z" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.093 13.5596L27.8028 15.5148" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.5352 19.7119L23.1451 20.8882" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                </div>
                <div>
                    <div class="print-area  md:hidden flex flex-col gap-2 w-full">
                        <div class="rounded-2xl flex flex-col items-center mt-2 border border-[#1E40AF] h-auto w-full my-4">
                            <table dir="ltr" class="w-full table-fixed items-center font-semibold justify-center text-center mx-auto">
                                @foreach($withdrawals as $withdrawal)
                                <tbody class="{{ !$loop->last ? 'border-b border-[#1E40AF]' : '' }}">
                                    <tr>
                                        <th class="pt-2 text-[13px]">مبلغ</th>
                                        <th class="pt-2 text-[13px]">نوع برداشت</th>
                                    </tr>
                                    <tr class="text-[#00000080]">
                                        <td  class="text-[10px]">{{ $withdrawal->amount}}</td>
                                        <td  class="text-[10px]">{{ $withdrawal->withdrawal_type }}</td>
                                    </tr>
                                    <tr>
                                        <th class="pt-2 text-[13px]">ادمین</th>
                                        <th class="pt-2 text-[13px]">تاریخ</th>
                                    </tr>
                                    <tr class="text-[#00000080]">
                                        <td  class="text-[10px] pb-4">{{ $withdrawal->withdrawal_date }}</td>
                                        <td  class="text-[10px] pb-4">{{ $withdrawal->withdrawal_date }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="pt-2 text-[13px]">توضیحات</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-[10px] pb-4">{{ $withdrawal->description}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div  class="flex flex-row gap-2 my-2 w-full px-4 mt-4">
                                <button class="flex justify-center border items-center rounded-lg border-[#1C274C] w-1/2 h-[25px] text-[#1C274C] text-[10px]">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                    <span>چاپ</span>
                                </button>
                                <button wire:click="edit({{ $withdrawal->id }})" class="flex justify-center border items-center rounded-lg border-[#1E40AF] w-1/2 h-[25px] text-[#1E40AF] text-[10px]">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>ویرایش</span>
                                </button>
                                <button wire:click="delete({{ $withdrawal->id }})"
                                    onclick="return confirm('حذف شود؟')" class="flex justify-center border items-center rounded-lg border-[#FF0000] w-1/2 h-[25px] text-[#FF0000] text-[10px]">
                                    <svg width="20"  height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M18.8499 9.14001L18.1999 19.21C18.0899 20.78 17.9999 22 15.2099 22H8.7899C5.9999 22 5.9099 20.78 5.7999 19.21L5.1499 9.14001" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.3301 16.5H13.6601" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.5 12.5H14.5" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>حذف</span>
                                </button>
                            </div>
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
                        <path d="M34.4314 16.596L32.8736 23.2407C31.5383 28.9792 28.8995 31.3001 23.9398 30.8232C23.145 30.7596 22.2866 30.6166 21.3646 30.394L18.694 29.7582C12.0652 28.1844 10.0146 24.9098 11.5725 18.2651L13.1303 11.6045C13.4482 10.2533 13.8297 9.07698 14.3066 8.1073C16.1665 4.26038 19.3299 3.22712 24.6393 4.48293L27.294 5.10289C33.9545 6.66073 35.9893 9.95128 34.4314 16.596Z" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M23.9399 30.8233C22.9543 31.491 21.7144 32.0474 20.2043 32.5401L17.6926 33.3668C11.3818 35.4015 8.05944 33.7006 6.00881 27.3897L3.97408 21.1107C1.93934 14.7998 3.62436 11.4616 9.93522 9.42682L12.4468 8.60021C13.0986 8.39356 13.7186 8.2187 14.3067 8.10742C13.8298 9.0771 13.4483 10.2534 13.1304 11.6046L11.5725 18.2652C10.0147 24.9099 12.0653 28.1845 18.6941 29.7583L21.3647 30.3941C22.2867 30.6167 23.1451 30.7598 23.9399 30.8233Z" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20.093 13.5596L27.8028 15.5148" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.5352 19.7119L23.1451 20.8882" stroke="#1E40AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                        <div class="relative mb-1">
                            <input type="text"  wire:model.live="search"  class="p-2 w-[100px]  bg-[#1E40AF]/20 text-[13px]  rounded-xl" placeholder="جستجو....">
                            <span class="absolute left-1 mt-1 top-1.5 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <table class="w-full text-center  text-sm border-collapse">
                    <thead class="bg-[#1E40AF] text-white">
                        <tr>
                            <th class="p-2 text-[12px]">شماره</th>
                            <th class="p-2 text-[12px]"> نوع برداشت</th>
                            <th class="p-2 text-[12px]">تاریخ</th>
                            <th class="p-2 text-[12px]">مبلغ</th>
                            <th class="p-2 text-[12px]">توضیحات</th>
                            <th class="p-2 text-[12px]">ادمین</th>
                            <th class="p-2 text-[12px]">چاپ</th>
                            <th class="p-2 text-[12px]">ویرایش</th>
                            <th class="p-2 text-[12px]">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($withdrawals as $withdrawal)
                        <tr class="text-[11px]  border-b-2 border-[#1E40AF]">
                            <td class="p-2 font-bold"> {{ $counter++ }}</td>
                            <td class="p-2"> {{$withdrawal->withdrawal_type}} </td>
                            <td class="p-2"> {{ \Morilog\Jalali\Jalalian::fromDateTime($withdrawal->withdrawal_date)->format('Y/m/d') }} </td>
                            <td class="p-2"> {{$withdrawal->amount}} </td>
                            <td class="p-2"> {{$withdrawal->description}} </td>
                            <td class="p-2"> {{$withdrawal->description}} </td>
                            <td class="p-2 text-center ">
                                <button wire:click="edit({{ $withdrawal->id }})" class="mx-auto block ">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                </button>
                            </td>
                            <td class="p-2 text-center">
                                <button wire:click="edit({{ $withdrawal->id }})" class="mx-auto block">
                                    <svg width="20"  height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#1E40AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#1E40AF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </td>
                            <td class="p-2 text-center">
                                <button class="mx-auto block" wire:click="delete({{ $withdrawal->id }})" onclick="return confirm('حذف شود؟')">
                                    <svg width="20"  height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
            <div class="flex flex-wrap gap-1 justify-center sm:hidden items-center mt-3 text-[10px]">
                @if ($withdrawals->lastPage() > 1)
                <button
                    wire:click="previousPage"
                    @disabled($withdrawals->onFirstPage())
                    class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                    قبلی
                </button>
                <span class="mx-2 text-sm font-medium">
                    {{ $withdrawals->currentPage() }} از {{ $withdrawals->lastPage() }}
                </span>
                <button
                    wire:click="nextPage"
                    @disabled($withdrawals->onLastPage())
                    class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                    بعدی
                </button>
                @endif
            </div>
        </div>
    </div>
</div>
