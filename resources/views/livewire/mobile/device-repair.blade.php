<div class="max-w-full mx-auto">
    <!-- کارت بزرگ -->
    <div class="bg-[#616161]/5 rounded-2xl shadow-[0px_4px_4px_0px_#00000040] shadow-xl p-5 mt-3">
        <div class="flex gap-2">
            <span><svg width="24" height="24" class="mt-1" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.66162 11.333H15.3283" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M7.99487 22H10.6615" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M13.9949 22H19.3282" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M29.3283 16.0403V21.4803C29.3283 26.1603 28.1416 27.3337 23.4083 27.3337H8.58162C3.84829 27.3337 2.66162 26.1603 2.66162 21.4803V10.5203C2.66162 5.84033 3.84829 4.66699 8.58162 4.66699H19.3283" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M25.4349 5.50675L20.4882 10.4534C20.3016 10.6401 20.1149 11.0134 20.0749 11.2801L19.8082 13.1734C19.7149 13.8534 20.1949 14.3334 20.8749 14.2401L22.7682 13.9734C23.0349 13.9334 23.4082 13.7467 23.5949 13.5601L28.5416 8.61341C29.3949 7.76008 29.7949 6.77341 28.5416 5.52008C27.2749 4.25341 26.2882 4.65342 25.4349 5.50675Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M24.7283 6.21289C25.1549 7.71956 26.3283 8.89289 27.8216 9.30622" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            </span>
            <h1 class="text-xl font-bold mb-2">فورم ثبت تعمیر دستگاه :</h1>
        </div>
        <div class="flex grid grid-cols-2 mr-8">
            <h1 class="text-sm font-bold mb-4">مشخصات دستګاه</h1>
            <h1 class="text-sm font-bold mb-4"> بخش خدمات</h1>
        </div>
        <!-- فرم -->
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <div  class="relative">
                        <select wire:model="category"  class="bg-white border border-gray-900 rounded-xl px-3 py-5 w-full pl-10 text-right">
                            <option value="">انتخاب کتگوری</option>
                            <option value="مبایل">مبایل</option>
                            <option value="دیسک تاپ">دیسک تاپ</option>
                            <option value="تبلیت">تبلیت</option>
                            <option value="لپتاپ">لپتاپ</option>
                        </select>
                    </div>
                    @error('category')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div   class="bg-white flex justify-between mb-2 shadow p-3 rounded-xl border border-black">
                    <div class="flex p-3  rounded-xl gap-2 items-center" id="btnLoan"
                        onclick="activeLoan()">
                        <h2 class="text-bold text-[13px] cursor-pointer">تعمیرات سخت افزاری</h2>
                    </div>
                    <div >
                        <button id="btnCash"
                        onclick="activeCash()"  class="bg-blue-700 text-[13px] p-3 rounded-xl text-white">
                            خدمات نرم افزاری
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                <div class="flex flex-col">
                    <div class="relative">
                        <input
                            wire:model="brand_name"
                            id="type"
                            placeholder=" نام برند"
                            class="border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right"
                        >
                        <!-- آیکن سمت چپ -->
                        <svg  class="w-5 h-5 text-gray-600 absolute top-1/2 -translate-y-1/2 left-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 12H9C10.7 12 12 13.3 12 15C12 16.7 10.7 18 9 18H3C2.4 18 2 17.6 2 17V7C2 6.4 2.4 6 3 6H8C9.7 6 11 7.3 11 9C11 10.7 9.7 12 8 12H2Z" stroke="#17191C" stroke-width="1.5" stroke-miterlimit="10"/>
                        <path d="M14 14H22C22 11.8 20.2 10 18 10C15.8 10 14 11.8 14 14ZM14 14C14 16.2 15.8 18 18 18H19.7" stroke="#17191C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.5 7.5H16.5" stroke="#17191C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    @error('brand_name')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <input
                            wire:model="device_model"
                            id="type"
                            placeholder=" مدل دستگاه"
                            class="border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right"
                        >
                        <!-- آیکن سمت چپ -->
                        <svg class="w-5 h-5 text-gray-600 absolute top-1/2  -translate-y-1/2 left-3"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 16.9503H6.21C2.84 16.9503 2 16.1103 2 12.7403V6.74027C2 3.37027 2.84 2.53027 6.21 2.53027H16.74C20.11 2.53027 20.95 3.37027 20.95 6.74027" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 21.4702V16.9502" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 12.9502H10" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.74023 21.4697H10.0002" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21.9998 12.7998V18.5098C21.9998 20.8798 21.4098 21.4698 19.0398 21.4698H15.4898C13.1198 21.4698 12.5298 20.8798 12.5298 18.5098V12.7998C12.5298 10.4298 13.1198 9.83984 15.4898 9.83984H19.0398C21.4098 9.83984 21.9998 10.4298 21.9998 12.7998Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.2445 18.25H17.2535" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    @error('device_model')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <select wire:model="repair_type" class="bg-white border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right">
                            <option value="">نوع تعمیر</option>
                            <option value="نرم‌افزاری">نرم‌افزاری</option>
                            <option value="سخت‌افزاری">سخت‌افزاری</option>
                            <option value="نصب ویندوز">نصب ویندوز</option>
                            <option value="برنامه ریزی">برنامه ریزی</option>
                        </select>
                    </div>
                    @error('repair_type')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <select wire:model="possible_time" class="bg-white border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right">
                            <option value="">تایم احتمالی</option>
                            <option value="یک روز">یک روز</option>
                            <option value="دو روز"> دو روز</option>
                            <option value="یک هفته">یک هفته</option>
                        </select>
                    </div>
                    @error('possible_time')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                <div class="flex flex-col">
                    <div class="relative">
                        <input
                            wire:model="imei_number"
                            id="type" type="number"
                            placeholder="شماره IMEI"
                            class="border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right"
                        >
                        <svg class="w-5 h-5 text-gray-600 absolute top-1/2  -translate-y-1/2 left-3" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.26022 2H16.7302C17.3802 2 17.9602 2.02003 18.4802 2.09003C21.2502 2.40003 22.0002 3.70001 22.0002 7.26001V13.58C22.0002 17.14 21.2502 18.44 18.4802 18.75C17.9602 18.82 17.3902 18.84 16.7302 18.84H7.26022C6.61022 18.84 6.03022 18.82 5.51022 18.75C2.74022 18.44 1.99023 17.14 1.99023 13.58V7.26001C1.99023 3.70001 2.74022 2.40003 5.51022 2.09003C6.03022 2.02003 6.61022 2 7.26022 2Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.5801 8.32031H17.2601" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.74023 14.1104H6.76022H17.2702" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 22H17" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.1947 8.2998H7.20368" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.4945 8.2998H10.5035" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    @error('imei_number')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <select wire:model="device_color" class="bg-white border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right">
                            <option value="">رنگ دستگاه</option>
                            <option value="آبی">آبی</option>
                            <option value="سرخ"> سرخ</option>
                            <option value="سفید">سفید</option>
                            <option value="سیاه">سیاه</option>
                            <option value="سبز">سبز</option>
                            <option value="زرد">زرد</option>
                            <option value="طلایی">طلایی</option>
                            <option value="خاکستری"> خاکستری</option>
                            <option value="رنگی">رنگی</option>
                        </select>
                        <!-- آیکن سمت چپ -->
                        <svg class="w-5 h-5 text-gray-600 absolute top-1/2  -translate-y-1/2 left-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.86982 5.6701L6.44982 7.75012L4.88982 5.19012C4.31982 4.25012 4.61982 3.01012 5.55982 2.44012C6.49982 1.87012 7.73982 2.1701 8.30982 3.1101L9.86982 5.6701Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.8201 9.1596L8.66012 11.0796C6.82012 12.1996 6.26011 14.4596 7.15011 16.2596L9.20011 20.4396C9.86011 21.7896 11.4601 22.2596 12.7401 21.4696L19.1701 17.5596C20.4601 16.7796 20.7701 15.1496 19.8801 13.9396L17.1101 10.1996C15.9101 8.57964 13.6601 8.0396 11.8201 9.1596Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.7564 5.09815L5.63184 8.21875L7.71224 11.6351L12.8368 8.51455L10.7564 5.09815Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.3101 16.8096L15.9601 19.5196" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.75 18.3701L13.4 21.0801" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.8701 15.25L18.5201 17.96" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    @error('device_color')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <input
                            wire:model="repair_cost"
                            id="type"
                            type="number"
                            placeholder="هزینه تعمیر"
                            class="border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right"
                        >
                        <!-- آیکن سمت چپ -->
                        <svg  class="w-5 h-5 text-gray-600 absolute top-1/2  -translate-y-1/2 left-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.67188 14.3298C8.67188 15.6198 9.66188 16.6598 10.8919 16.6598H13.4019C14.4719 16.6598 15.3419 15.7498 15.3419 14.6298C15.3419 13.4098 14.8119 12.9798 14.0219 12.6998L9.99187 11.2998C9.20187 11.0198 8.67188 10.5898 8.67188 9.36984C8.67188 8.24984 9.54187 7.33984 10.6119 7.33984H13.1219C14.3519 7.33984 15.3419 8.37984 15.3419 9.66984" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 6V18" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 22H9C4 22 2 20 2 15V9C2 4 4 2 9 2H15C20 2 22 4 22 9V15C22 20 20 22 15 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    @error('repair_cost')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <div
                            onclick="document.getElementById('delivery').showPicker()"
                            class="w-full py-3 px-4 text-gray-500 border border-black rounded-xl cursor-pointer bg-white"
                        >
                            @if($delivery_date)
                                {{ \Carbon\Carbon::parse($delivery_date)->translatedFormat('Y/m/d') }}
                            @else
                                تاریخ مراجعه
                            @endif
                        </div>

                        <input
                            id="delivery"
                            type="date"
                            wire:model.live="delivery_date"
                            class="absolute opacity-0 pointer-events-none"
                        >
                        <!-- آیکن سمت چپ -->
                        <svg class="w-5 h-5 text-gray-600 absolute top-1/2  -translate-y-1/2 left-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 2V5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 2V5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.5 9.08984H20.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.21 15.7703L15.6701 19.3103C15.5301 19.4503 15.4 19.7103 15.37 19.9003L15.18 21.2503C15.11 21.7403 15.45 22.0803 15.94 22.0103L17.29 21.8203C17.48 21.7903 17.75 21.6603 17.88 21.5203L21.4201 17.9803C22.0301 17.3703 22.3201 16.6603 21.4201 15.7603C20.5301 14.8703 19.82 15.1603 19.21 15.7703Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.7002 16.2803C19.0002 17.3603 19.8402 18.2003 20.9202 18.5003" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5V12" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.9955 13.7002H12.0045" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.29431 13.7002H8.30329" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.29431 16.7002H8.30329" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    @error('delivery_date')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                <!-- کالم 1 -->
                <div class="flex flex-col ">
                    <div class="relative">
                        <select wire:model="device_status" id="" class="bg-white border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right">
                            <option value="">شرایط دستګاه</option>
                            <option value="شکسته">شکسته</option>
                            <option value="خوب">خوب</option>
                            <option value="نسبتاٌ خوب">نسبتاٌ خوب</option>
                        </select>
                    </div>
                    @error('device_status')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <!-- کالم 2 -->
                <div class="flex flex-col">
                    <div class="relative">
                        <select wire:model="device_mode" id="" class=" bg-white  border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right">
                            <option class="text-black" value="">حالت دستګاه</option>
                            <option class="text-black" value="جدید">جدید</option>
                            <option class="text-black" value="استفاده شده">استفاده شده</option>
                            <option class="text-black" value="معیوب">معیوب</option>
                        </select>
                    </div>
                    @error('device_mode')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col md:col-span-2">
                    <div class="relative ">
                        <input
                            wire:model="description"
                            id="type"
                            placeholder=" توضیحات"
                            class="border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right"
                        >
                        <svg class="w-5 h-5 text-gray-600 absolute top-1/2 -translate-y-1/2 left-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 2H8C4 2 2 4 2 8V21C2 21.55 2.45 22 3 22H16C20 22 22 20 22 16V8C22 4 20 2 16 2Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.9098 7.84015L7.71979 13.0302C7.51979 13.2302 7.3298 13.6202 7.2898 13.9002L7.0098 15.8802C6.9098 16.6002 7.40979 17.1002 8.12979 17.0002L10.1098 16.7202C10.3898 16.6802 10.7798 16.4902 10.9798 16.2902L16.1698 11.1002C17.0598 10.2102 17.4898 9.17015 16.1698 7.85015C14.8498 6.52015 13.8098 6.94015 12.9098 7.84015Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.1699 8.58008C12.6099 10.1501 13.8399 11.3901 15.4199 11.8301" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    @error('description')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <h1 class="mt-2">مشخصات مشتری</h1>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                <div class="flex flex-col">
                    <div class="relative">
                        <input
                            wire:model="name"
                            id="type"
                            placeholder="  نام کامل "
                            class="border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right"
                        >
                        <!-- آیکن سمت چپ -->
                        <svg class="w-5 h-5 text-gray-600 absolute top-1/2 -translate-y-1/2 left-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.1601 10.87C12.0601 10.86 11.9401 10.86 11.8301 10.87C9.45006 10.79 7.56006 8.84 7.56006 6.44C7.56006 3.99 9.54006 2 12.0001 2C14.4501 2 16.4401 3.99 16.4401 6.44C16.4301 8.84 14.5401 10.79 12.1601 10.87Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.16021 14.56C4.74021 16.18 4.74021 18.82 7.16021 20.43C9.91021 22.27 14.4202 22.27 17.1702 20.43C19.5902 18.81 19.5902 16.17 17.1702 14.56C14.4302 12.73 9.92021 12.73 7.16021 14.56Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    @error('name')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <input wire:model="last_name" id="type" type="text" placeholder="تخلص" class="border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right">
                        <!-- آیکن سمت چپ -->
                        <svg class="w-5 h-5 text-gray-600 absolute top-1/2 -translate-y-1/2 left-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.1601 10.87C12.0601 10.86 11.9401 10.86 11.8301 10.87C9.45006 10.79 7.56006 8.84 7.56006 6.44C7.56006 3.99 9.54006 2 12.0001 2C14.4501 2 16.4401 3.99 16.4401 6.44C16.4301 8.84 14.5401 10.79 12.1601 10.87Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.16021 14.56C4.74021 16.18 4.74021 18.82 7.16021 20.43C9.91021 22.27 14.4202 22.27 17.1702 20.43C19.5902 18.81 19.5902 16.17 17.1702 14.56C14.4302 12.73 9.92021 12.73 7.16021 14.56Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    @error('last_name')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <input
                            wire:model="phone_number"
                            id="type"
                            placeholder=" شماره تماس"
                            class="border border-gray-900 rounded-lg px-3 py-3 w-full pl-10 text-right"
                        >
                        <!-- آیکن سمت چپ -->
                        <svg class="w-5 h-5 text-gray-600 absolute top-1/2 -translate-y-1/2 left-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.97 18.33C21.97 18.69 21.89 19.06 21.72 19.42C21.55 19.78 21.33 20.12 21.04 20.44C20.55 20.98 20.01 21.37 19.4 21.62C18.8 21.87 18.15 22 17.45 22C16.43 22 15.34 21.76 14.19 21.27C13.04 20.78 11.89 20.12 10.75 19.29C9.6 18.45 8.51 17.52 7.47 16.49C6.44 15.45 5.51 14.36 4.68 13.22C3.86 12.08 3.2 10.94 2.72 9.81C2.24 8.67 2 7.58 2 6.54C2 5.86 2.12 5.21 2.36 4.61C2.6 4 2.98 3.44 3.51 2.94C4.15 2.31 4.85 2 5.59 2C5.87 2 6.15 2.06 6.4 2.18C6.66 2.3 6.89 2.48 7.07 2.74L9.39 6.01C9.57 6.26 9.7 6.49 9.79 6.71C9.88 6.92 9.93 7.13 9.93 7.32C9.93 7.56 9.86 7.8 9.72 8.03C9.59 8.26 9.4 8.5 9.16 8.74L8.4 9.53C8.29 9.64 8.24 9.77 8.24 9.93C8.24 10.01 8.25 10.08 8.27 10.16C8.3 10.24 8.33 10.3 8.35 10.36C8.53 10.69 8.84 11.12 9.28 11.64C9.73 12.16 10.21 12.69 10.73 13.22C11.27 13.75 11.79 14.24 12.32 14.69C12.84 15.13 13.27 15.43 13.61 15.61C13.66 15.63 13.72 15.66 13.79 15.69C13.87 15.72 13.95 15.73 14.04 15.73C14.21 15.73 14.34 15.67 14.45 15.56L15.21 14.81C15.46 14.56 15.7 14.37 15.93 14.25C16.16 14.11 16.39 14.04 16.64 14.04C16.83 14.04 17.03 14.08 17.25 14.17C17.47 14.26 17.7 14.39 17.95 14.56L21.26 16.91C21.52 17.09 21.7 17.3 21.81 17.55C21.91 17.8 21.97 18.05 21.97 18.33Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"/>
                        </svg>
                    </div>
                    @error('phone_number')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <div
                            onclick="document.getElementById('visit').showPicker()"
                            class="w-full py-3 px-4 text-gray-500 border border-black rounded-xl cursor-pointer bg-white"
                        >
                            @if($visit_date)
                                {{ \Carbon\Carbon::parse($visit_date)->translatedFormat('Y/m/d') }}
                            @else
                                تاریخ مراجعه
                            @endif
                        </div>

                        <input
                            id="visit"
                            type="date"
                            wire:model.live="visit_date"
                            class="absolute opacity-0 pointer-events-none"
                        >
                        <!-- آیکن سمت چپ -->
                        <svg class="w-5 h-5 text-gray-600 absolute top-1/2 -translate-y-1/2 left-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 2V5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 2V5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.5 9.08984H20.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.21 15.7703L15.6701 19.3103C15.5301 19.4503 15.4 19.7103 15.37 19.9003L15.18 21.2503C15.11 21.7403 15.45 22.0803 15.94 22.0103L17.29 21.8203C17.48 21.7903 17.75 21.6603 17.88 21.5203L21.4201 17.9803C22.0301 17.3703 22.3201 16.6603 21.4201 15.7603C20.5301 14.8703 19.82 15.1603 19.21 15.7703Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.7002 16.2803C19.0002 17.3603 19.8402 18.2003 20.9202 18.5003" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5V12" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.9955 13.7002H12.0045" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.29431 13.7002H8.30329" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.29431 16.7002H8.30329" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                    @error('visit_date')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- دکمه ثبت -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-4">
                <button type="submit" class="btn btn-primary bg-blue-700 text-white rounded-xl py-3 text-sm">{{ $editing ? 'ویرایش ' : 'ثبت ' }}</button>
                <button type="button" wire:click.prevent="resetForm" class="bg-red-600 text-white rounded-xl py-3 text-sm">انصراف</button>
            </div>
            @if($successMessage)
                <div class="bg-green-100 text-green-700 p-2 my-4 rounded-xl">
                    {{ $successMessage }}
                </div>
            @endif
        </form>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 p-2">
        <!-- جدول و کارت موبایل -->
        <div class="lg:col-span-2 bg-[#616161]/5 rounded-2xl shadow-[0px_4px_4px_0px_#00000040] shadow-xl shadow-lg border border-gray-200 w-full lg:max-w-full p-3">
            <!--mobile mode-->
            <div class="container print-area flex flex-col gap-2 md:hidden text-[10px] w-full bg-white" >
                @foreach($DeviceRepair as $a)
                <div class="rounded-2xl flex flex-col items-center mt-1 border border-[#0948EE66] h-auto w-full">
                    <table dir="ltr"
                        class="w-full table-fixed items-center font-semibold justify-center text-center mx-auto">
                        <tr>
                            <th class="pt-2">
                                نام مشتری
                            </th>
                            <th>
                                نام دستګاه
                            </th>
                        </tr>
                        <tr class="text-[#00000080]">
                            <td  class="text-[10px]">{{ $a->name }} {{ $a->last_name }}</td>
                            <td  class="text-[10px]">{{ $a->device_model}}</td>
                        </tr>
                        <tr>
                            <th class="pt-2">کتگوری</th>
                            <th>شماره IMEI</th>
                        </tr>
                        <tr class="text-[#00000080]">
                            <td  class="text-[10px]">{{ $a->category }}</td>
                            <td  class="text-[10px]">{{ $a->imei_number}}</td>
                        </tr>
                        <tr>
                            <th class="pt-2">رنگ</th>
                            <th>شماره تماس</th>
                        </tr>
                        <tr class="text-[#00000080]">
                            <td  class="text-[10px]">{{ $a->device_color }}</td>
                            <td  class="text-[10px]">{{ $a->phone_number}}</td>
                        </tr>
                        <tr>
                            <th class="pt-2">نوع تعمیر</th>
                            <th>هزینه تعمیر</th>
                        </tr>
                        <tr class="text-[#00000080]">
                            <td  class="text-[10px]">{{ $a->repair_type }}</td>
                            <td  class="text-[10px]">{{ $a->repair_cost}}</td>
                        </tr>
                        <tr>
                            <th class="pt-2">توضیحات</th>
                            <th>شرایط دستګاه</th>
                        </tr>
                        <tr class="text-[#00000080]">
                            <td  class="text-[10px]">{{ $a->description }}</td>
                            <td  class="text-[10px]">{{ $a->device_status}}</td>
                        </tr>
                        <tr>
                            <th class="pt-2">حالت دستگاه</th>
                            <th>تایم احتمالی</th>
                        </tr>
                        <tr class="text-[#00000080]">
                            <td  class="text-[10px]">{{ $a->device_mode }}</td>
                            <td  class="text-[10px]">{{ $a->possible_time}}</td>
                        </tr>
                        <tr>
                            <th class="pt-2">تاریخ تحویل</th>
                            <th>تاریخ مراجعه</th>
                        </tr>
                        <tr class="text-[#00000080]">
                            <td  class="text-[10px]">{{ $a->delivery_date }}</td>
                            <td  class="text-[10px]">{{ $a->visit_date}}</td>
                        </tr>
                    </table>
                    <div class="flex flex-row gap-2 my-2 w-full px-4 mt-4">
                        <a href="{{ route('customer.edit', $a->id) }}" class="curser-pointer flex justify-center items-center gap-1 border rounded-lg border-[#0033BB] w-1/2 h-[30px] text-[#0033BB] text-[10px]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#0948EE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>ویرایش</span>
                        </a>
                        <button  wire:click="delete({{ $a->id }})"  onclick="return confirm('حذف شود؟')" class="curser-pointer flex justify-center items-center gap-1 border rounded-lg border-[#FF0000] w-1/2 h-[30px] text-[#FF0000] text-[10px]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                @endforeach
            </div>
            <!-- جدول دسکتاپ -->
            <div class="hidden md:block overflow-x-auto overflow-y-auto">
                <div class="flex justify-between mb-3">
                    <div class="flex gap-1 items-center">
                        <i>
                        <svg width="30" height="30" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                        <h2 class="font-bold text-lg mb-0">لیست قرضه ها:</h2>
                    </div>
                    <div class="flex flex-col lg:flex-row gap-1">
                        <!-- جستجو -->
                        <div class="relative mb-1">
                            <input wire:model.live="search" type="text" class="p-1 w-[170px]  bg-[#0948EE]/20  rounded-xl" placeholder="جستجو....">
                            <span class="absolute left-1 top-1.5 text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <table class="w-full text-center  border-2 border-blue-200 text-sm border-collapse">
                    <thead class="bg-[#0B35CC]/10">
                        <tr>
                            <th class="p-2 text-[12px]">شماره</th>
                            <th class="p-2 text-[12px]">نام مشتری</th>
                            <th class="p-2 text-[12px]">نام دستګاه</th>
                            <th class="p-2 text-[12px]">کتگوری</th>
                            <th class="p-2 text-[12px]">شماره IMEI</th>
                            <th class="p-2 text-[12px]">رنگ</th>
                            <th class="p-2 text-[12px]">شماره تماس</th>
                            <th class="p-2 text-[12px]">نوع تعمیر</th>
                            <th class="p-2 text-[12px]">هزینه تعمیر</th>
                            <th class="p-2 text-[12px]">توضیحات</th>
                            <th class="p-2 text-[12px]">شرایط دستګاه</th>
                            <th class="p-2 text-[12px]">حالت دستګاه</th>
                            <th class="p-2 text-[12px]">تایم احتمالی</th>
                            <th class="p-2 text-[12px]">تاریخ تحویل</th>
                            <th class="p-2 text-[12px]">تاریخ مراجعه</th>
                            <th class="p-2 text-[12px]">ویرایش</th>
                            <th class="p-2 text-[12px]">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($DeviceRepair as $a)
                        <tr class="hover:bg-gray-50 text-[11px]  border-b-2 border-blue-200">
                            <td class="p-2"> {{ $counter++ }}</td>
                            <td class="p-2"> {{$a->name}} {{$a->last_name}}</td>
                            <td class="p-2"> {{$a->brand_name}}  {{$a->device_model}} </td>
                            <td class="p-2"> {{$a->category}}</td>
                            <td class="p-2"> {{$a->imei_number}}</td>
                            <td class="p-2"> {{$a->device_color}}</td>
                            <td class="p-2"> {{$a->phone_number}}</td>
                            <td class="p-2"> {{$a->repair_type}}</td>
                            <td class="p-2"> {{$a->repair_cost}}</td>
                            <td class="p-2"> {{$a->description}}</td>
                            <td class="p-2"> {{$a->device_status}}</td>
                            <td class="p-2"> {{$a->device_mode}}</td>
                            <td class="p-2"> {{$a->possible_time}}</td>
                            <td class="p-2"> {{$a->delivery_date}}</td>
                            <td class="p-2"> {{$a->visit_date}}</td>
                            <td class="p-2  ">
                                <button wire:click="edit({{ $a->id }})">
                                    <svg width="20" class="mr-8" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#0948EE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </td>
                            <td class="p-2">
                                <button onclick="confirm('حذف شود؟') || event.stopImmediatePropagation()"
                                        wire:click="confirmDelete({{ $a->id }})">
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

            <!-- صفحه بندی -->
            <div class="flex items-start justify-center md:justify-start mt-4 space-x-1 rtl:space-x-reverse">
                <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">‹</button>
                <button class="w-7 h-7 rounded-md border border-blue-500 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs font-medium">1</button>
                <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">2</button>
                <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">...</button>
                <button class="w-7 h-7 rounded-md border border-transparent bg-[#0948EE]/60 hover:bg-[#0948EE] text-white text-xs">25</button>
                <button class="w-7 h-7 rounded-md border border-gray-300 bg-[#0948EE]/60 hover:bg-[#0948EE] text-white">›</button>
            </div>
        </div>
    </div>

<script>
function activeCash() {
    const cash = document.getElementById('btnCash');
    const loan = document.getElementById('btnLoan');

    cash.classList.add('bg-blue-700', 'text-white');
    cash.classList.remove('text-black');

    loan.classList.remove('bg-blue-700', 'text-white');
    loan.classList.add('text-black');
}

function activeLoan() {
    const cash = document.getElementById('btnCash');
    const loan = document.getElementById('btnLoan');

    loan.classList.add('bg-blue-700', 'text-white');
    loan.classList.remove('text-black');

    cash.classList.remove('bg-blue-700', 'text-white');
    cash.classList.add('text-black');
}
</script>
