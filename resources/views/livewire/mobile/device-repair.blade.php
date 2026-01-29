<div class="max-w-full mx-auto">
    <div class="border  border-gray-300 rounded-2xl shadow-[0px_4px_4px_0px_#00000040] shadow-xl p-5 mt-3">
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
            <h1 class="text-sm font-bold mb-4">مشخصات دستگاه:</h1>
            <h1 class="text-sm font-bold mb-4"> بخش خدمات:</h1>
        </div>
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
                        onclick="activeCash()"  class="bg-blue-800 text-[13px] p-3 rounded-xl text-white">
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
                            class="input-field"
                        >
                        <svg fill="#000000" class="w-5 h-5 text-gray-600 absolute top-1/2 -translate-y-1/2 left-3" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M4 11a1 1 0 0 1-1 1 1 1 0 0 1-1-1 1 1 0 0 1 1-1 1 1 0 0 1 1 1zm3.5 11c-.67 0-1.236.452-1.426 1.063l-2.656.443c-.242.04-.418.25-.418.494v3c0 .245.176.454.418.494l2.656.443C6.264 28.547 6.83 29 7.5 29h4c.67 0 1.236-.452 1.426-1.063l2.656-.443c.242-.04.418-.25.418-.494v-3c0-.245-.176-.454-.418-.494l-2.656-.444C12.736 22.453 12.17 22 11.5 22zm0 1h4c.286 0 .5.214.5.5v4c0 .286-.214.5-.5.5h-4c-.286 0-.5-.214-.5-.5v-4c0-.286.214-.5.5-.5zM6 24.092v2.816l-2-.332v-2.152zm7 0l2 .332v2.152l-2 .332zM5.5 3c-.276 0-.5.224-.5.5v15c0 .276.224.5.5.5h11c.67 0 .654-1 0-1H6V4h18v4.5c0 .66 1 .67 1 0v-5c0-.276-.224-.5-.5-.5zm-4-2C.678 1 0 1.678 0 2.5v17c0 .822.678 1.5 1.5 1.5h15c.67 0 .66-1 0-1h-15c-.286 0-.5-.214-.5-.5v-17c0-.286.214-.5.5-.5h24c.286 0 .5.214.5.5v6c0 .677 1 .66 1 0v-6c0-.822-.678-1.5-1.5-1.5zm21 11h3c.277 0 .5.223.5.5s-.223.5-.5.5h-3c-.277 0-.5-.223-.5-.5s.223-.5.5-.5zm-3-2c-.822 0-1.5.678-1.5 1.5v16c0 .822.678 1.5 1.5 1.5h9c.822 0 1.5-.678 1.5-1.5v-16c0-.822-.678-1.5-1.5-1.5zm0 1h9c.286 0 .5.214.5.5v16c0 .286-.214.5-.5.5h-9c-.286 0-.5-.214-.5-.5v-16c0-.286.214-.5.5-.5zM24 25c.554 0 1 .446 1 1s-.446 1-1 1-1-.446-1-1 .446-1 1-1z"></path></g></svg>
                    </div>
                    @error('brand_name')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <input  wire:model="device_model"  id="type"  placeholder=" مدل دستگاه"    class="input-field"  >
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
                        <select wire:model="repair_type" class=" input-field">
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
                        <select wire:model="possible_time" class=" input-field">
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
                        <input  wire:model="imei_number" id="type" type="number" placeholder="شماره IMEI"   class="input-field"  >
                        <svg class="w-5 h-5 text-gray-600 absolute top-1/2  -translate-y-1/2 left-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M17.968 2.00002C18.3659 2.00002 18.7652 1.99427 19.1624 2.02137C19.4922 2.04388 19.8221 2.09338 20.1481 2.22838C20.8832 2.53287 21.4672 3.11689 21.7717 3.85197C21.9067 4.1779 21.9562 4.50781 21.9787 4.83764C22.0058 5.23487 22 5.6341 22 6.03201C22 6.47066 22 6.84915 21.9787 7.16241C21.9562 7.49223 21.9067 7.82215 21.7717 8.14807C21.4672 8.88316 20.8832 9.46718 20.1481 9.77166C19.8221 9.90667 19.4922 9.95617 19.1624 9.97867C18.7652 10.0058 18.3659 10 17.968 10C17.5294 10 17.1509 10 16.8376 9.97867C16.5078 9.95617 16.1779 9.90667 15.852 9.77166C15.1169 9.46718 14.5329 8.88316 14.2284 8.14807C14.0934 7.82215 14.0439 7.49223 14.0214 7.16241C14 6.84915 14 6.47066 14 6.03201C14 5.6341 13.9943 5.23487 14.0214 4.83764C14.0439 4.50781 14.0934 4.1779 14.2284 3.85197C14.5329 3.11689 15.1169 2.53287 15.852 2.22838C16.1779 2.09338 16.5078 2.04388 16.8376 2.02137C17.1509 2 17.5294 2.00001 17.968 2.00002Z" fill="#323232"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M6.03201 2.00002C6.47066 2.00001 6.84915 2 7.16241 2.02137C7.49223 2.04388 7.82215 2.09338 8.14807 2.22838C8.88316 2.53287 9.46718 3.11689 9.77166 3.85197C9.90667 4.1779 9.95617 4.50781 9.97867 4.83764C10.0058 5.23487 10 5.6341 10 6.03201C10 6.47066 10 6.84915 9.97867 7.16241C9.95617 7.49223 9.90667 7.82215 9.77166 8.14807C9.46718 8.88316 8.88316 9.46718 8.14807 9.77166C7.82215 9.90667 7.49223 9.95617 7.16241 9.97867C6.84915 10 6.47066 10 6.03201 10C5.6341 10 5.23487 10.0058 4.83764 9.97867C4.50781 9.95617 4.1779 9.90667 3.85197 9.77166C3.11689 9.46718 2.53287 8.88316 2.22838 8.14807C2.09338 7.82215 2.04388 7.49223 2.02137 7.16241C2 6.84915 2.00001 6.47066 2.00002 6.03201C2.00002 5.6341 1.99427 5.23487 2.02137 4.83764C2.04388 4.50781 2.09338 4.1779 2.22838 3.85197C2.53287 3.11689 3.11689 2.53287 3.85197 2.22838C4.1779 2.09338 4.50781 2.04388 4.83764 2.02137C5.23487 1.99427 5.6341 2.00002 6.03201 2.00002Z" fill="#323232"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.96804 14C6.36595 14 6.76517 13.9943 7.16241 14.0214C7.49223 14.0439 7.82215 14.0934 8.14807 14.2284C8.88316 14.5329 9.46718 15.1169 9.77166 15.852C9.90667 16.1779 9.95617 16.5078 9.97867 16.8376C10 17.1509 10 17.5294 10 17.968C10 18.3659 10.0058 18.7652 9.97867 19.1624C9.95617 19.4922 9.90667 19.8221 9.77166 20.1481C9.46718 20.8832 8.88316 21.4672 8.14807 21.7717C7.82215 21.9067 7.49223 21.9562 7.16241 21.9787C6.84915 22 6.47066 22 6.03201 22C5.6341 22 5.23487 22.0058 4.83764 21.9787C4.50781 21.9562 4.1779 21.9067 3.85197 21.7717C3.11689 21.4672 2.53287 20.8832 2.22838 20.1481C2.09338 19.8221 2.04388 19.4922 2.02137 19.1624C1.99427 18.7652 2.00002 18.3659 2.00002 17.968C2.00001 17.5294 2 17.1509 2.02137 16.8376C2.04388 16.5078 2.09338 16.1779 2.22838 15.852C2.53287 15.1169 3.11689 14.5329 3.85197 14.2284C4.1779 14.0934 4.50781 14.0439 4.83764 14.0214C5.1509 14 5.52939 14 5.96804 14Z" fill="#323232"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C12.5523 2 13 2.44772 13 3V6C13 6.55228 12.5523 7 12 7C11.4477 7 11 6.55228 11 6V3C11 2.44772 11.4477 2 12 2Z" fill="#323232"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M19 18C19 18.5523 18.5523 19 18 19H15C14.4477 19 14 18.5523 14 18C14 17.4477 14.4477 17 15 17H18C18.5523 17 19 17.4477 19 18Z" fill="#323232"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M22 15C22 15.5523 21.5523 16 21 16H18C17.4477 16 17 15.5523 17 15C17 14.4477 17.4477 14 18 14H21C21.5523 14 22 14.4477 22 15Z" fill="#323232"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M10 12C10 12.5523 9.55228 13 9 13L3 13C2.44772 13 2 12.5523 2 12C2 11.4477 2.44772 11 3 11L9 11C9.55228 11 10 11.4477 10 12Z" fill="#323232"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 12.5523 21.5523 13 21 13L13 13C11.8954 13 11 12.1046 11 11L11 9C11 8.44771 11.4477 8 12 8C12.5523 8 13 8.44771 13 9L13 11L21 11C21.5523 11 22 11.4477 22 12Z" fill="#323232"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5 21C13.5 21.5523 13.9477 22 14.5 22L20 22C21.1046 22 22 21.1046 22 20L22 18C22 17.4477 21.5523 17 21 17C20.4477 17 20 17.4477 20 18L20 20L14.5 20C13.9477 20 13.5 20.4477 13.5 21Z" fill="#323232"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C11.4477 22 11 21.5523 11 21L11 16C11 14.8954 11.8954 14 13 14L15 14C15.5523 14 16 14.4477 16 15C16 15.5523 15.5523 16 15 16L13 16L13 21C13 21.5523 12.5523 22 12 22Z" fill="#323232"></path> </g></svg>
                    </div>
                    @error('imei_number')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <select wire:model="device_color" class=" input-field">
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
                    </div>
                    @error('device_color')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <input   wire:model="repair_cost" id="type" type="text"  placeholder="هزینه تعمیر"  class="input-field no-spinner" >
                        <svg class="w-5 h-5 text-gray-600 absolute top-1/2  -translate-y-1/2 left-3" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="layer1"> <path d="M 0 4 L 0 15 L 18 15 L 18 4 L 0 4 z M 1 5 L 17 5 L 17 14 L 1 14 L 1 5 z M 3 6 C 3 6.558207 2.558207 7 2 7 L 2 8 C 3.0986472 8 4 7.0986472 4 6 L 3 6 z M 8.5 6 L 8.5 7 C 7.677495 7 7 7.677495 7 8.5 C 7 9.322505 7.677495 10 8.5 10 L 9.5 10 C 9.782065 10 10 10.217935 10 10.5 C 10 10.782065 9.782065 11 9.5 11 L 8.5 11 L 7 11 L 7 12 L 8.5 12 L 8.5 13 L 9.5 13 L 9.5 12 C 10.322504 12 11 11.322505 11 10.5 C 11 9.6774955 10.322504 9 9.5 9 L 8.5 9 C 8.217935 9 8 8.782065 8 8.5 C 8 8.217935 8.217935 8 8.5 8 L 9.5 8 L 11 8 L 11 7 L 9.5 7 L 9.5 6 L 8.5 6 z M 14 6 C 14 7.0986472 14.901353 8 16 8 L 16 7 C 15.441793 7 15 6.558207 15 6 L 14 6 z M 19 6 L 19 16 L 2 16 L 2 17 L 20 17 L 20 6 L 19 6 z M 2 11 L 2 12 C 2.558207 12 3 12.441793 3 13 L 4 13 C 4 11.901353 3.0986472 11 2 11 z M 16 11 C 14.901353 11 14 11.901353 14 13 L 15 13 C 15 12.441793 15.441793 12 16 12 L 16 11 z " style="fill:#222222; fill-opacity:1; stroke:none; stroke-width:0px;"></path> </g> </g></svg>
                    </div>
                    @error('repair_cost')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <div  onclick="document.getElementById('delivery').showPicker()"   class="input-field" >
                            @if($delivery_date)
                                {{ \Carbon\Carbon::parse($delivery_date)->translatedFormat('Y/m/d') }}
                            @else
                                تاریخ تحویل
                            @endif
                        </div>
                        <input  id="delivery"  type="date" wire:model.live="delivery_date"  class="absolute opacity-0 pointer-events-none"  >
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
                <div class="flex flex-col ">
                    <div class="relative">
                        <select wire:model="device_status" id="" class=" input-field">
                            <option value="">شرایط دستگاه</option>
                            <option value="شکسته">شکسته</option>
                            <option value="خوب">خوب</option>
                            <option value="نسبتاٌ خوب">نسبتاٌ خوب</option>
                        </select>
                    </div>
                    @error('device_status')
                        <span class=" text-red-500 text-[8px] px-2 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="relative">
                        <select wire:model="device_mode" id="" class="   input-field">
                            <option class="text-black" value="">حالت دستگاه</option>
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
                        <input  wire:model="description"  id="type"  placeholder=" توضیحات" class="input-field" >
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
            <h1 class="mt-2">مشخصات مشتری:</h1>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                <div class="flex flex-col">
                    <div class="relative">
                        <input  wire:model="name"  id="type"  placeholder="  نام  "   class="input-field" >
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
                        <input wire:model="last_name" id="type" type="text" placeholder="تخلص" class="input-field">
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
                        <input  wire:model="phone_number"  id="type"   placeholder=" شماره تماس"   class="input-field"   >
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
                        <div   onclick="document.getElementById('visit').showPicker()"    class="input-field" >
                            @if($visit_date)
                                {{ \Carbon\Carbon::parse($visit_date)->translatedFormat('Y/m/d') }}
                            @else
                                تاریخ مراجعه
                            @endif
                        </div>
                        <input  id="visit"  type="date" wire:model.live="visit_date"  class="absolute opacity-0 pointer-events-none"  >
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
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-4">
                <button type="button" wire:click.prevent="resetForm" class="bg-red-800 hover:bg-red-700 text-white rounded-lg py-3 text-sm">انصراف</button>
                <button type="submit" class="btn btn-primary hover:bg-blue-700 bg-blue-800 text-white rounded-lg py-3 text-sm">{{ $editing ? 'ویرایش ' : 'ثبت ' }}</button>
            </div>
            @if($successMessage)
                <div class="bg-green-100 text-green-700 p-2 my-4 rounded-xl">
                    {{ $successMessage }}
                </div>
            @endif
        </form>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 p-2">
        <div class="lg:col-span-2 border  border-gray-300 rounded-2xl shadow-[0px_4px_4px_0px_#00000040] shadow-xl shadow-lg border border-gray-200 w-full lg:max-w-full p-3">
            <div class="container print-area flex flex-col gap-2 md:hidden text-[10px] w-full bg-white" >
                @forelse($DeviceRepair as $a)
                <div class="rounded-2xl flex flex-col items-center mt-1 border border-[#0948EE66] h-auto w-full">
                    <table dir="ltr"
                        class="w-full table-fixed items-center font-semibold justify-center text-center mx-auto">
                        <tr>
                            <th class="pt-2">
                                نام مشتری
                            </th>
                            <th>
                                نام دستگاه
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
                            <th>شرایط دستگاه</th>
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
                        <tr>
                            <th colspan="2" class="pt-2">ادمین </th>
                        </tr>
                        <tr class="text-[#00000080]">
                            <td colspan="2"  class="text-[10px]">{{ $a->delivery_date }}</td>
                        </tr>
                    </table>
                    <div class="flex flex-row gap-2 my-2 w-full px-4 mt-4">
                        <a href="{{ route('customer.edit', $a->id) }}" class="curser-pointer flex justify-center items-center gap-1 border rounded-lg border-[#0033BB] w-1/2 h-[30px] text-[#0033BB] text-[10px]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                            <span>چاپ</span>
                        </a>
                        <a href="{{ route('customer.edit', $a->id) }}" class="curser-pointer flex justify-center items-center gap-1 border rounded-lg border-[#0033BB] w-1/2 h-[30px] text-[#0033BB] text-[10px]">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#0948EE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>ویرایش</span>
                        </a>
                    </div>
                </div>
                @empty
                <div class="flex justify-center gap-3 mt-5">
                        هیچ دستگاهی ثبت نشده
                </div>
                @endforelse
            </div>
            <div class="hidden md:block overflow-x-auto overflow-y-auto">
                <div class="flex flex-col md:flex-row justify-between items-center w-full mt-1 gap-1 md:gap-2">
                    <div class="flex gap-2 w-full ">
                        <div class="relative   w-full  md:w-1/4  ">
                            <input type="text"  wire:model.live="search" class="w-full h-full block rounded-md md:rounded-lg bg-[#1E40AF]/20  md:top-0 md:right-0 pr-2 text-[7px] sm:p-4  p-4  md:text-[10px]" placeholder="جستجو">
                            <span class="absolute md:hidden left-1  top-3">
                                <svg  width="14" height="14" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.899 14.9749C8.8537 14.9749 6.38498 12.5062 6.38498 9.46083C6.38498 6.4155 8.8537 3.94678 11.899 3.94678C14.9444 3.94678 17.4131 6.4155 17.4131 9.46083C17.4131 12.5062 14.9444 14.9749 11.899 14.9749Z"
                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M5.80448 15.5554L6.96533 14.3945" stroke="#292D32" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="hidden md:block absolute left-2 top-4">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.899 14.9749C8.8537 14.9749 6.38498 12.5062 6.38498 9.46083C6.38498 6.4155 8.8537 3.94678 11.899 3.94678C14.9444 3.94678 17.4131 6.4155 17.4131 9.46083C17.4131 12.5062 14.9444 14.9749 11.899 14.9749Z"
                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M5.80448 15.5554L6.96533 14.3945" stroke="#292D32" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <table class="w-full mt-2 text-center   text-sm border-collapse">
                    <thead class="bg-[#1E40AF] text-white">
                        <tr>
                            <th class="p-2 text-[12px]">آیدی</th>
                            <th class="p-2 text-[12px]">نام مشتری</th>
                            <th class="p-2 text-[12px]">نام دستگاه</th>
                            <th class="p-2 text-[12px]">کتگوری</th>
                            <th class="p-2 text-[12px]">ادمین</th>
                            <th class="p-2 text-[12px]">شماره IMEI</th>
                            <th class="p-2 text-[12px]">رنگ</th>
                            <th class="p-2 text-[12px]">شماره تماس</th>
                            <th class="p-2 text-[12px]">نوع تعمیر</th>
                            <th class="p-2 text-[12px]">هزینه تعمیر</th>
                            <th class="p-2 text-[12px]">توضیحات</th>
                            <th class="p-2 text-[12px]">شرایط دستگاه</th>
                            <th class="p-2 text-[12px]">حالت دستگاه</th>
                            <th class="p-2 text-[12px]">تایم احتمالی</th>
                            <th class="p-2 text-[12px]">تاریخ تحویل</th>
                            <th class="p-2 text-[12px]">تاریخ مراجعه</th>
                            <th class="p-2 text-[12px]">چاپ</th>
                            <th class="p-2 text-[12px]">ویرایش</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($DeviceRepair as $a)
                        <tr class="hover:bg-gray-50 text-[11px]  border-b-2 border-blue-200">
                            <td class="p-2"> {{ $counter++ }}</td>
                            <td class="p-2"> {{$a->name}} {{$a->last_name}}</td>
                            <td class="p-2"> {{$a->brand_name}}  {{$a->device_model}} </td>
                            <td class="p-2"> {{$a->category}}</td>
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
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 10H6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M19 14L5 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <circle cx="17" cy="10" r="1" fill="#1C274C"></circle> <path d="M15 16.5H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M13 19H9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 12C22 14.8284 22 16.2426 21.1213 17.1213C20.48 17.7626 19.5535 17.9359 18 17.9827M6 17.9827C4.44655 17.9359 3.51998 17.7626 2.87868 17.1213C2 16.2426 2 14.8284 2 12C2 9.17157 2 7.75736 2.87868 6.87868C3.75736 6 5.17157 6 8 6H16C18.8284 6 20.2426 6 21.1213 6.87868C21.4211 7.17848 21.6186 7.54062 21.7487 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17.9827 6C17.9359 4.44655 17.7626 3.51998 17.1213 2.87868C16.2426 2 14.8284 2 12 2C9.17157 2 7.75736 2 6.87868 2.87868C6.23738 3.51998 6.06413 4.44655 6.01732 6M18 15V16C18 18.8284 18 20.2426 17.1213 21.1213C16.48 21.7626 15.5535 21.9359 14 21.9827M6 15V16C6 18.8284 6 20.2426 6.87868 21.1213C7.51998 21.7626 8.44655 21.9359 10 21.9827" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                </button>
                            </td>
                            <td class="p-2  ">
                                <button wire:click="edit({{ $a->id }})">
                                    <svg width="20" class="mr-8" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#0948EE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16.0399 3.02001L8.15988 10.9C7.85988 11.2 7.55988 11.79 7.49988 12.22L7.06988 15.23C6.90988 16.32 7.67988 17.08 8.76988 16.93L11.7799 16.5C12.1999 16.44 12.7899 16.14 13.0999 15.84L20.9799 7.96001C22.3399 6.60001 22.9799 5.02001 20.9799 3.02001C18.9799 1.02001 17.3999 1.66001 16.0399 3.02001Z" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.9102 4.15002C15.5802 6.54002 17.4502 8.41002 19.8502 9.09002" stroke="#0948EE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="17" class="p-4 text-center text-gray-400">
                                هیچ دستگاهی ثبت نشده
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="flex flex-wrap gap-1 justify-center sm:hidden items-center mt-3 text-[10px]">
                @if ($DeviceRepair->lastPage() > 1)
                <button
                    wire:click="previousPage"
                    @disabled($DeviceRepair->onFirstPage())
                    class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                    قبلی
                </button>
                <span class="mx-2 text-sm font-medium">
                    {{ $DeviceRepair->currentPage() }} از {{ $DeviceRepair->lastPage() }}
                </span>
                <button
                    wire:click="nextPage"
                    @disabled($DeviceRepair->onLastPage())
                    class="px-2 py-1 text-sm bg-blue-800 text-white rounded disabled:opacity-50">
                    بعدی
                </button>
                @endif
            </div>
        </div>
    </div>
